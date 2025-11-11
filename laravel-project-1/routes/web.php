<?php

use Illuminate\Support\Facades\Route;

// copy the App\Http\Controllers from ProductController.php and paste the ProductController from line 15
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


// the index after ::class is from public function index() in ProductController.php

Route::get('/products', [ProductController::class, 'index'])->name('products.index');