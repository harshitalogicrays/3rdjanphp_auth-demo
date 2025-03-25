<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
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

    }));
});

Route::controller(frontendController::class)->group((function(){ 
    Route::get('/','index');
    Route::get('/shop','shop');
    Route::get('/shop/{id}','viewproduct');

}));
   

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
