<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ReceiptController;
use App\Http\Controllers\Admin\ReceiptDetailController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admin/users/login', LoginController::class)->only('index');
Route::resource('admin/users/login/store', LoginController::class)->only('store');
Route::get('logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function () {

    Route::middleware(['isAdmin'])->group(function () {
        Route::prefix('admin')->group(function () {

            Route::get('/', [MainController::class, 'index'])->name('admin');
            Route::get('main', [MainController::class, 'index']);

            Route::prefix('users')->group(function () {
                Route::get('add', [UserController::class, 'create']);
                Route::post('add', [UserController::class, 'store']);
                Route::get('list', [UserController::class, 'index'])->name('test1');
                Route::get('edit/{user}', [UserController::class, 'show']);
                Route::post('edit/{user}', [UserController::class, 'update']);
                Route::DELETE('destroy', [UserController::class, 'destroy']);
            });
    
    
            Route::prefix('categories')->group(function () {
                Route::get('add', [CategoryController::class, 'create']);
                Route::post('add', [CategoryController::class, 'store']);
                Route::get('list', [CategoryController::class, 'index'])->name('test3');
                Route::get('edit/{category}', [CategoryController::class, 'show']);
                Route::post('edit/{category}', [CategoryController::class, 'update']);
                Route::DELETE('destroy', [CategoryController::class, 'destroy']);
            });

            

    
            Route::prefix('products')->group(function () {
                Route::get('add', [ProductController::class, 'create']);
                Route::post('add', [ProductController::class, 'store']);
                Route::get('list', [ProductController::class, 'index'])->name('test2');
                Route::get('edit/{product}', [ProductController::class, 'show']);
                Route::post('edit/{product}', [ProductController::class, 'update']);
                Route::DELETE('destroy', [ProductController::class, 'destroy']);
            });
    
            Route::prefix('banners')->group(function () {
                Route::get('add', [BannerController::class, 'create']);
                Route::post('add', [BannerController::class, 'store']);
                Route::get('list', [BannerController::class, 'index'])->name('test');
                Route::get('edit/{banner}', [BannerController::class, 'show']);
                Route::post('edit/{banner}', [BannerController::class, 'update']);
                Route::DELETE('destroy', [BannerController::class, 'destroy']);
            });

            Route::prefix('suppliers')->group(function () {
                Route::get('add', [SupplierController::class, 'create']);
                Route::post('add', [SupplierController::class, 'store']);
                Route::get('list', [SupplierController::class, 'index'])->name('aaa');
                Route::get('edit/{supplier}', [SupplierController::class, 'show']);
                Route::post('edit/{supplier}', [SupplierController::class, 'update']);
                Route::DELETE('destroy', [SupplierController::class, 'destroy']);
            });

            Route::prefix('receipts')->group(function () {
                Route::get('list', [ReceiptController::class, 'index'])->name('receipt');
                Route::post('add', [ReceiptController::class, 'add'])->name('add');

            });
            Route::prefix('receipt-detail')->group(function () {
                Route::post('testt', [ReceiptDetailController::class, 'testt'])->name('testt');
            });
            Route::get('view-receipt/{id}', [ReceiptController::class, 'view']);

            Route::get('orders', [OrderController::class, 'index'])->name('searchorder');
            Route::get('view-order/{id}', [OrderController::class, 'view']);
            Route::put('update-order/{id}', [OrderController::class, 'updateOrder']);


            Route::post('upload/services', [UploadController::class, 'store']);
        });
    });


});

    Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\MainController::class, 'index']);
    Route::post('/services/load-product', [App\Http\Controllers\MainController::class, 'loadProduct']);
    
    Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\CategoryController::class, 'index'])->name('cates.index');
    Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

    Route::get('cart', [App\Http\Controllers\ProductController::class, 'cart'])->name('cart');
    Route::get('add-to-cart/{id}', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('add.to.cart');
    Route::patch('update-cart', [App\Http\Controllers\ProductController::class, 'update'])->name('update.cart');
    Route::delete('remove-from-cart', [App\Http\Controllers\ProductController::class, 'remove'])->name('remove.from.cart');

    Route::get('checkout', [App\Http\Controllers\CheckoutController::class, 'index']);
    Route::post('place-order', [App\Http\Controllers\CheckoutController::class, 'placeOrder']);

    Route::get('my-order', [App\Http\Controllers\OrderController::class, 'index'])->name('order');
    Route::get('view-order/{id}', [App\Http\Controllers\OrderController::class, 'a']);
    Route::resource('reviews', App\Http\Controllers\RateController::class)->only(['store','update','destroy']);

    Route::resource('profiles', App\Http\Controllers\ProfileController::class)->only('index', 'update');
    Route::resource('change-password', App\Http\Controllers\ChangePasswordController::class)->only(['index', 'update']);







