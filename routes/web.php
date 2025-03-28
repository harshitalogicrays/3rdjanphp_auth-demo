<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\Admin\admincontroller;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();



Route::prefix('admin')->middleware(['auth',AdminMiddleware::class])->group(function(){
    Route::controller(admincontroller::class)->group((function(){
        Route::get('dashboard' ,'index');
        Route::get('add/product' ,'addp');
        Route::get('view/product' ,'viewp');
        Route::post('add/product' ,'store')->name('addproduct');
        Route::get('delete/product/{id}' ,'deletep');
        Route::get('edit/product/{id}' ,'editp');
        Route::put('update/product/{id}' ,'updatep')->name('updateproduct');
        Route::get('orders' ,'displayorders');
        Route::get('vieworder/{id}' ,'vieworder');
        Route::put('orders/update/{id}' ,'updateorder');
    }));
});

Route::controller(frontendController::class)->group((function(){ 
    Route::get('/','index');
    Route::get('/shop','shop');
    Route::get('/shop/{id}','viewproduct');
}));
   
Route::get('/cart',[cartController::class,'index'])->middleware('auth');
Route::get('/checkout',[checkoutController::class,'index'])->middleware('auth');
Route::get('/thankyou',[checkoutController::class,'thankyou']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
