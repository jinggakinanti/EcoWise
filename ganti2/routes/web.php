<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['middleware' => 'ClearCheckoutSession', 'CheckRole:customer'])->prefix('/ecowise')->group(function(){

    Route::get('/home', [HomeController::class,'view'])->name('home.page');

    Route::get('/profile', [ProfileController::class,'view'])->name('profile.page');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile_update.page');
    Route::post('/profile/upload', [ProfileController::class,'upload_image'])->name('upload_image');

    Route::get('/cart', [CartController::class,'view'])->name('cart.page');
    Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart_update');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart_remove');

    Route::get('/checkout', [TransactionController::class,'show'])->name('checkout.page')->withoutMiddleware('ClearCheckoutSession');
    Route::get('/checkout/{id}', [TransactionController::class,'show2'])->name('checkout2.page')->withoutMiddleware('ClearCheckoutSession');
    Route::post('/checkout/changeAddress', [TransactionController::class, 'change_address'])->name('change_address')->withoutMiddleware('ClearCheckoutSession');
    Route::post('/checkout/placeOrder', [TransactionController::class, 'create'])->name('place_order')->withoutMiddleware('ClearCheckoutSession');
    Route::post('/checkout/placeOrder/{id}', [TransactionController::class, 'create2'])->name('place_order2')->withoutMiddleware('ClearCheckoutSession');
    Route::post('/checkout/redeemPoints', [TransactionController::class, 'redeem'])->name('redeem_points')->withoutMiddleware('ClearCheckoutSession');

    Route::get('/transaction', [TransactionController::class,'history'])->name('transaction.page');
    Route::get('/transaction/filter', [TransactionController::class, 'filter2'])->name('transaction_filter.page');
    Route::get('/transaction/success/{id}', [TransactionController::class,'success'])->name('success.page');
    
});

Route::middleware(['middleware' => 'CheckRole:admin'])->prefix('/ecowise')->group(function(){
    Route::get('/home_admin', [HomeController::class,'view'])->name('home_admin.page');
    Route::post('/home_admin/addProduct', [HomeController::class,'add'])->name('add_product');

    Route::post('/detail/{id}/updateStock', [DetailController::class,'update'])->name('update_stock');
    Route::delete('/detail/{id}', [DetailController::class, 'destroy'])->name('product_remove');

    Route::get('/transactions', [TransactionController::class,'history2'])->name('alltransaction.page');
    Route::get('/transactions/filter', [TransactionController::class, 'filter'])->name('alltransactions.page');
    
});

Route::middleware(['auth'])->prefix('/ecowise')->group(function(){
    Route::get('/transaction/{id}', [TransactionController::class,'detail'])->name('transactiondetail.page');
});

Route::middleware(['middleware' => 'ClearCheckoutSession'])->prefix('/ecowise')->group(function(){
    Route::get('/home', [HomeController::class,'view'])->name('home.page');

    Route::get('/aboutus', [AboutUsController::class,'view'])->name('aboutus.page');
    
    Route::get('/detail/{id}', [DetailController::class,'view'])->name('detail.page');
    Route::post('/detail/{id}', [CartController::class,'add'])->name('cart_add');

    Route::get('/category/{id}', [CategoryController::class,'view'])->name('category.page');

    Route::get('/search', [SearchController::class,'view'])->name('search.page');
});

Auth::routes();

Route::post('logout', function () {
    Auth::logout();
    return redirect('/ecowise/home'); 
})->name('logout');

Route::get('/set-locale/{locale}', function($locale){
    if(in_array($locale, ['en','id'])){
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('set-locale');
