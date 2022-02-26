<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CategoriesController;
use \App\Http\Controllers\BrandController;
use \App\Http\Controllers\SizesController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum'])->group(function(){
    
    Route::resource('categories',CategoriesController::class);
    Route::resource('brands',BrandController::class);
    Route::resource('sizes',SizesController::class);
});
