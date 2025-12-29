<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminMenuController;
use App\Models\Menu;
use Illuminate\Support\Facades\Route;

// --- ROUTE BAWAAN KAMU ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/reserve', [HomeController::class, 'reserve'])->name('reserve');
Route::post('/purchase', [HomeController::class, 'purchase'])->name('purchase');

Route::get('/home', function () {
    return view('home');
})->name('halaman.home');

Route::get('/menu', function () {
    return view('menu');
})->name('halaman.menu');




