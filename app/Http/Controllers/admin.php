<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;
use App\Modela\Cart;
use App\Models\order;
use Barryvdh\DomPDF\Facade\Pdf;  // Add this line for PDF facade
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail; // Import the OrderMail class






class admin extends Controller
{
    public function viewCat()
    {

        $categories = Category::all();
        return view('admin.viewCat', compact('categories'));
    }

 public function addCat(Request $request)
    {
        $category = new Category;
        $category->CategoryName = $request->CategoryName;
        $category->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

public function deleteCat($id)
{
    $category = Category::find($id);
    if ($category) {
        $category->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    } else {
        return redirect()->back()->with('error', 'Category Not Found');
    }
}

public function addProd(){

$categories = Category::all();


    return view('admin.product', compact('categories'));


}

public function addProduct(Request $request){
    $product = new Product;
    $product->title = $request->title;
    $product->description = $request->description;
    $product->image = $request->image;
    $imagename=time().'.'.$request->image->getClientOriginalExtension();
    $product->image->move('product', $imagename);
    $product->image=$imagename;
    $product->category = $request->category;
    $product->quantity = $request->quantity;
    $product->price = $request->price;
    $product->discount = $request->discount;

    $product->save();

    return redirect()->back()->with('message','Saved successfully');



}

public function showProduct(){
    $products = Product::all();
    return view('admin.showProduct', compact('products'));

}


public function deleteProduct($id){
    $product = Product::find($id);
    if ($product){
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    } else {
        return redirect()->back()->with('error', 'Product Not Found');
    }
}

public function editProduct($id){
    $product = Product::find($id);

    $categories = Category::all();
    if ($product) {
        return view('admin.editProduct', compact('product', 'categories'));
    } else {
        return redirect()->back()->with('error', 'Product Not Found');
    }

}
public function updateProduct($id, Request $request){
    $product = Product::find($id);
    $product->title = $request->title;
    $product->description = $request->description;
    $image = $request->image;
    if ($request->hasFile('image')) { // Check if an image file is uploaded
        $image = $request->file('image'); // Get the uploaded file
        $imagename = time() . '.' . $image->getClientOriginalExtension(); // Generate a unique name
        $image->move('product', $imagename); // Move the file to the 'product' directory
        $product->image = $imagename; // Update the product's image field
    }


    $product->category = $request->category;
    $product->quantity = $request->quantity;
    $product->price = $request->price;
    $product->discount = $request->discount;

    $product->save();    return redirect()->back()->with('message','Product Updated Successfully');

}

public function order (){

    $data= order::all();

    return view('admin.order', compact('data'));



}

public function delivered($id){
    $order = order::find($id);
    if ($order){
        $order->deliveryStatus= 'delivered';
        $order->paymentStatus= 'Paid';
        $order->save();
        return redirect()->back()->with('message', 'Order Delivered Successfully');
    } else {
        return redirect()->back()->with('error', 'Order Not Found');
    }
}

public function printPdf($id){
    $order = order::find($id);
    if ($order) {
        $pdf = PDF::loadView('admin.pdf', compact('order'));
        return $pdf->download('invoice.pdf');
    } else {
        return redirect()->back()->with('error', 'Order Not Found');
    }
}

public function sendEmail($id)
{
    $order = order::find($id);
    if ($order) {
        try {
            Mail::to($order->email)->send(new OrderMail($order));
            session()->flash('message', 'Email Sent Successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to send email: ' . $e->getMessage());
            return redirect()->back();
        }
    } else {
        session()->flash('error', 'Order Not Found');
        return redirect()->back();
    }
}
}
