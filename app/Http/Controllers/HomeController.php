<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\order;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


use Stripe;





class HomeController extends Controller
{

    //function for the index page

    public function index(){

        $product = Product::paginate(9); // paginate(3) for getting 3 products per page

        $comments = Comment::latest()->get(); // Fetch all comments, latest first
        $reply = Reply::latest()->get(); // Fetch all replies, latest first
            $newArrivals = Product::latest()->take(3)->get(); // Fetch latest 6 products


        // $product = Product::all(); for getting all the products from the database in the product table

        return view("home.user", compact("product","newArrivals"));
    }

    //function for usertype
public function redirect(){
    $usertype = auth()->user()->usertype;

    if($usertype == "1"){

        $totalProducts = Product::all()->count() ; // use for counting the total product in the product table
        $totalOrders = order::all()->count() ; // use for counting in the order table

       $totalUsers = User::all()->count() ;
        // use for counting the total users in the user table

        $orders = order::all(); // get all the orders from the order table
        $totalRev = 0; // initialize total revenue variable
        foreach($orders as $order){

            $totalRev += $order->price * $order->quantity; // calculate total revenue





        }
        $totalDelivered = order::where('deliveryStatus', 'Delivered')->count(); // count delivered orders
        $totalProcessing = order::where('deliveryStatus', 'Processing')->count(); // count processing orders


 return view("admin.home", compact(
            "totalProducts",
            "totalOrders",
            "totalUsers",
            "totalRev",
            "totalDelivered",
            "totalProcessing"


        ));}

else{
    $product = Product::paginate(8); // paginate(3) for getting 3 products per page
            $comments = Comment::latest()->get(); // Fetch all comments
            $newArrivals = Product::latest()->take(3)->get();


    // $product = Product::all(); for getting all the products from the database in the product table

    return view("home.user", compact("product", "newArrivals" ));}

}

public function productDetails($id){
    $product = Product::find($id);
    return view('home.productDetails', compact('product'));

}


public function addCart(Request $request, $id)
{
    if(Auth::id()) {
        try {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->productTitle = $product->title;
            $cart->quantity = $request->quantity;

            if($product->discount != null) {
                $discountedPrice = $product->price - ($product->price * $product->discount / 100);
                $cart->price = $discountedPrice;
            } else {
                $cart->price = $product->price;
            }

            $cart->image = $product->image;
            $cart->productId = $product->id;
            $cart->userId = $user->id;

            $cart->save();
            $cartCount = Cart::where('userId', $user->id)->count();

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Product Added Successfully',
                    'cartCount' => $cartCount
                ]);
            }

            return redirect()->back()->with('message', 'Product Added Successfully');

        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error adding product to cart'
                ], 500);
            }
            return redirect()->back()->with('error', 'Error adding product to cart');
        }
    }

    if ($request->ajax()) {
        return response()->json([
            'success' => false,
            'message' => 'Please login first'
        ], 401);
    }
    return redirect('login');
}

public function getCartCount()
{
    if (Auth::id()) {
        $count = Cart::where('userId', Auth::id())->count();
        return response()->json(['count' => $count]);
    }
    return response()->json(['count' => 0]);
}

public function cartPage(){

    if(Auth::id()){
        $userId = Auth::user()->id;
        $cart = Cart::where('userId', $userId)->get();

        // Calculate total price
        $totalPrice = $cart->sum(function ($item) {
            return $item->price * $item->quantity;});

            // Get the cart count
        $cartCount = Cart::where('userId', $userId)->count();

        return view('home.cartPage', compact('cart'));
    }
    else{
        return redirect('login');
    }
}

public function removeCart($id){

    if(Auth::id()){
        $cart = Cart::find($id);
        if($cart){
            $cart->delete();

            return redirect()->back()->with('message','item removed');
        }
        else{
            return redirect('login');
        }


}
}

public function cashDelivery(Request $request){

    $userId = Auth::user()->id;
    $data = Cart::where('userId', $userId)->get();

    foreach($data as $item){
        $order = new order;
        $order->name = $item->name;
        $order->email = $item->email;
        $order->phone = $item->phone;
        $order->address = $item->address;
        $order->productTitle = $item->productTitle;
        $order->quantity = $item->quantity;
        $order->price = $item->price;
        $order->image = $item->image;
        $order->productId = $item->productId;
        $order->paymentStatus = 'Cash on Delivery';
        $order->deliveryStatus = 'Processing';


        $order->userId = Auth::user()->id;

        //save the order
        $order->save();

        $dataId = $item->id; //geting the id of the cart
        $cart = Cart::find($dataId); //find the cart by id
        if ($cart) { // Check if the cart item exists
            $cart->delete(); // Delete the cart item
        }


        //delete the cart
        Cart::where('userId', Auth::user()->id)->delete();
    }
    return redirect()->back()->with('message', 'Order Placed Successfully and we will contact you soon');
}

// public function payCard(Request $request){

//     $userId = Auth::user()->id;
//     $cart = Cart::where('userId', $userId)->get();
//     return view('home.payCard', compact('cart'));
// }

public function stripe($totalPrice){

    return view('home.stripe', compact('totalPrice'));
}

 public function stripePost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stripeToken' => 'required',
            'totalPrice' => 'required|numeric|min:0.01', // Ensure totalPrice is present, numeric, and at least 0.01
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            Stripe\Stripe::setApiKey(env('Stripe_API_SECRET'));

            Stripe\Charge::create([
                "amount" => $request->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment"
            ]);

            Session::flash('success', 'Payment successful!');

            return back();
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return back();
        }
    }

public function orderPro(){
    if(Auth::id()){
        $userId = Auth::user()->id;
        $orders = order::where('userId', $userId)->get();
        $cartCount = Cart::where('userId', $userId)->count();
        return view('home.orderPro', compact('orders', 'cartCount'));
    } else {
        return redirect('login');
}
}

public function cancelOrder($id)
{
    if (Auth::id()) {
        $order = order::find($id);
        if ($order && $order->userId == Auth::id()) {
            $order->delete();
            return redirect()->back()->with('message', 'Order Cancelled Successfully');
        } else {
            return redirect()->back()->with('error', 'Order Not Found or Unauthorized');
        }
    }
    return redirect('login');


}

public function addComment(Request $request)
{
    if (Auth::check()) {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $user = Auth::user();
        $comment = new Comment;
        $comment->name = $user->name;
        $comment->comment = $request->comment;
        $comment->user_id = $user->id; // Use user_id if that's your DB column
        $comment->save();

        return redirect()->back()->with('message', 'Comment added successfully');
    }

    return redirect('login')->with('error', 'Please login to add a comment');
}


public function chatbotResponse(Request $request)
{
    $question = strtolower($request->input('message'));
    $products = Product::all();

    // Try to match product title
    foreach ($products as $product) {
        if (str_contains($question, strtolower($product->title))) {
            return response()->json([
                'reply' => "YES! 😊 \n\n{$product->title} is available.\n\n It is used for:  {$product->description}\n\nThe price is \${$product->price}.\n\n You can add it to your cart or ask about similar products."
            ]);
        }
    }

    // Try to match by keywords in description
    foreach ($products as $product) {
        if (str_contains($question, strtolower($product->description))) {
            return response()->json([
                'reply' => "Thanks for asking! 🌱\n\nIt sounds like you're interested in **{$product->title}**.\n\n{$product->description}\n\nCurrent price: **\${$product->price}**.\n\nDo you want to add this to your cart or learn about other tools?"
            ]);
        }
    }

    // If asking for price or cost
    if (preg_match('/price|cost|how much|amount/i', $question)) {
        $suggest = $products->random();
        return response()->json([
            'reply' => "Looking for prices? For example, our **{$suggest->title}** is just \${$suggest->price}. Let me know if you want details about a specific tool!"
        ]);
    }

    // If asking for recommendation or help
    if (preg_match('/recommend|suggest|which|best|help/i', $question)) {
        $suggest = $products->random();
        return response()->json([
            'reply' => "I'd be happy to help you choose! For many farmers, **{$suggest->title}** is a popular choice. Would you like to know more about it or tell me what kind of work you need the tool for?"
        ]);
    }

    // Fallback
    return response()->json([
        'reply' => "Hi I am Mr. Farms and I am here to assist! 🌾\n\nYou can ask about a specific tool, its price, or get recommendations. What are you looking for today?"
    ]);
}

public function search(Request $request)
{
    // Validate the search query (optional but recommended)
    $request->validate([
        'query' => 'nullable|string|max:255'
    ]);

    $query = $request->input('query');

    // If the query is empty, return all products or an empty result as you prefer
    if ($query) {
        $products = Product::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->paginate(9);
    } else {
        $products = collect(); // or: Product::paginate(9) to show all
    }

    return view('home.searchResults', compact('products', 'query'));
}
}


// This code is part of a Laravel application that handles user authentication, product management, and order processing.
