<?php

use App\Http\Controllers\{
    ProfileController,
    productController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/reportes', function () {
    return view('reportes');
})->name('reportes');

Route::get('/consultar-tablas', [productController::class, 'index'])->name('consultar_tablas');

Route::get('/nuevo-producto', function () {
    return view('nuevo_producto');
})->name('nuevo_producto');

Route::get('/entradas', function () {
    return view('entradas');
})->name('entradas');

Route::get('/salidas', function () {
    return view('salidas');
})->name('salidas');

require __DIR__.'/auth.php';
