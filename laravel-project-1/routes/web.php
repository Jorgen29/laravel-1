<?php

use Illuminate\Support\Facades\Route;

// copy the App\Http\Controllers from ProductController.php and paste the ProductController from line 15
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


// the index after ::class is from public function index() in ProductController.php
//view list of products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
//view forms
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

//for sending data to database
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

/// for showing edit form
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
//for updating data in database
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');