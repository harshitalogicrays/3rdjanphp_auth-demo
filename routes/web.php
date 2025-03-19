<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\admincontroller;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware(['auth',AdminMiddleware::class])->group(function(){
    Route::controller(admincontroller::class)->group((function(){
        Route::get('dashboard' ,'index');
        Route::get('add/product' ,'addp');
        Route::get('view/product' ,'viewp');

    }));
});
