<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('index');
    });

    Route::resource('/posts', \App\Http\Controllers\PostController::class);
    Route::resource('kategori', \App\Http\Controllers\KategoriController::class);
    Route::resource('produk', \App\Http\Controllers\ProductController::class);
    Route::resource('transaksi', \App\Http\Controllers\TransaksiController::class);
    Route::post('/kategori', [\App\Http\Controllers\KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/carts', [\App\Http\Controllers\CartController::class, 'index'])->name('carts.index');
    Route::post('/carts', [\App\Http\Controllers\CartController::class, 'store'])->name('carts.store');
    Route::delete('/carts/{cart}', [\App\Http\Controllers\CartController::class, 'destroy'])->name('carts.destroy');
    Route::get('/transactions', [\App\Http\Controllers\TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/checkout', [\App\Http\Controllers\TransactionController::class, 'checkout'])->name('checkout');
});

// Authentication routes
Auth::routes();
