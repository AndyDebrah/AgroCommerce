<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/', [HomeController::class,'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::get('/redirect', [HomeController::class,'redirect'])->middleware('auth', 'verified');

route::get('/viewCat', [admin::class,'viewCat']);
route::post('/addCat', [admin::class,'addCat']);
route::get('/delCat/{id}', [admin::class,'deleteCat']);
route::get('/addProd', [admin::class,'addProd']);
route::post('/addProduct', [admin::class,'addProduct']);
route::get('/showProduct', [admin::class,'showProduct']);
route::get('/editProduct/{id}', [admin::class,'editProduct']);

route::post('/updateProduct/{id}', [admin::class,'updateProduct']);
route::get('/deleteProduct/{id}', [admin::class,'deleteProduct']);

route::get('/order', [admin::class,'order']);

route::get('/delivered/{id}', [admin::class,'delivered']);
route::get('/printPdf/{id}', [admin::class,'printPdf']);
route::get('/sendEmail/{id}', [admin::class,'sendEmail']);




route::get('/productDetails/{id}', [HomeController::class,'productDetails'])->name('product.details');
route::get('/cartPage', [HomeController::class,'cartPage']);
route::post('/addCart/{id}', [HomeController::class,'addCart']);
route::get('/removeCart/{id}', [HomeController::class,'removeCart']);
route::get('/cashDelivery', [HomeController::class,'cashDelivery']);
route::get('/stripe/{totalPrice}', [HomeController::class,'stripe'])->name('stripe');
Route::post('stripe', [HomeController::class,'stripePost'])->name('stripe.post');
Route::get('/get-cart-count', [HomeController::class, 'getCartCount']);
Route::get('/orderPro', [HomeController::class, 'orderPro'])->name('orderPro');
Route::get('/cancelOrder/{id}', [HomeController::class, 'cancelOrder'])->name('cancelOrder');

// Route::post('/addComment', [HomeController::class, 'addComment'])->name('addComment');

Route::post('/chatbot', [HomeController::class, 'chatbotResponse']);

route::get('/search', [HomeController::class, 'search'])->name('search');














require __DIR__.'/auth.php';
