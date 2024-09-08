<?php

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Notifications\NewNotification;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\ShoppingCartController;

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
// Admin routes
Route::middleware(['auth','admin'])->group(function(){
    Route::get('/deleteProduct/{id}', [AdminController::class, 'deleteProduct']);
    Route::post('/updateProduct/{id}', [AdminController::class, 'updateProduct']);
    Route::post('/addProduct',[AdminController::class,'addProduct']);
    Route::get('/AllProducts',[AdminController::class,'getProducts']);
    Route::get('/AllOrders',[AdminController::class,'getOrders']);
    Route::get('/AllUsers',[AdminController::class,'getUsers']);
    Route::get('/deleteUser/{id}',[AdminController::class,'deleteUser']);   
    Route::post('/updateUser/{id}',[AdminController::class,'editUser']);
    Route::get('/Notif',[AdminController::class,'getNotif']);
    Route::get('/deleteNotif/{id}',[AdminController::class,'deleteNotif']);
    Route::get('/orders',[AdminController::class,'getOrdersP']);
    Route::post('/order/{id}',[AdminController::class,'confirmShipp']);
    });

Route::middleware(['admin', 'auth'])->group(function () {
    Route::get('/admin/{any}', function () {
        return view('dash'); // Blade template for admin dashboard
    })->where('any', '.*'); // Match all sub-routes for Vue Router
});
Route::post('/logout', function () {
    Auth::logout();
    return response()->json(['message' => 'Logged out successfully']);
})->name('logout');

Route::post('/saveOrder',OrderController::class)
    ->name('order.store')->middleware('auth');
Route::get('/', WelcomeController::class);
Route::get('/merci', function () {
    // Ensure the user is authenticated
    if (Auth::check()) {
        // Fetch the admin user
        $user = User::where('is_admin', 1)->first();
        
        if ($user) {
            // Fetch the latest order for the authenticated user
            $order = Order::where('user_id', Auth::id())->latest()->first();
            
            if ($order) {
                // Send notification
                $user->notify(new NewNotification($order));
            }
        }
    }
    Session::put('redirected_to_page', true);
    return view('merci');
})->middleware(['auth']);
Route::get('/shoppingCart',ShoppingCartController::class)
    ->name('cart.index');

Route::get('/checkout',[CheckOutController::class , 'create' ])->middleware('auth');
Route::post('/getPaymentIntent',[CheckOutController::class , 'PaymentIntent' ])->middleware('auth');
Route::get('/product-{id}',[ProductController::class,'show'])
    ->name('products.show');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('products',[ProductController::class,'index'])
    ->name('products.index');
    Route::get('productsM',[ProductController::class,'indexMen'])
    ->name('products.indexM');
    Route::get('productsW',[ProductController::class,'indexWomen'])
    ->name('products.indexW');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
