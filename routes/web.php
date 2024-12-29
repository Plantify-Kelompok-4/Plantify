<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\LandHistoryController;

Route::get('/', [AuthController::class, 'showRegistrationForm'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/product-buy', [ProductController::class, 'showProductBuy'])->name('product.buy');

Route::get('/product-pupuk', [ProductController::class, 'showProductPupuk'])->name('product.pupuk');

Route::get('/product-sewa', [ProductController::class, 'showProductSewa'])->name('product.sewa');

Route::get('/produk/{id}', [ProductController::class, 'show'])->name('produk.show');

Route::get('/sewa/{id}', [ProductController::class, 'showSewa'])->name('sewa.show');

Route::get('/pupuk/{id}', [ProductController::class, 'showPupuk'])->name('pupuk.show');

Route::get('/consultation', [PageController::class, 'showConsultation'])->name('consultation.show');

Route::get('/home', [PageController::class, 'showHome'])->name('home.show');

Route::get('/monitoring', [PageController::class, 'showMonitoring'])->name('monitoring.show');

Route::post('/submit-plant-data', [PlantController::class, 'processPlantData']);

Route::get('/locations', [LocationController::class, 'showLocations'])->name('locations.index');
Route::get('/locations/delete/{id}', [LocationController::class, 'destroy'])->name('locations.destroy');
Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
Route::get('/locations/{id}', [LocationController::class, 'show'])->name('locations.show');

Route::post('/lands', [LandController::class, 'store'])->name('lands.store');
Route::put('/lands/{id}', [LandController::class, 'update'])->name('lands.update');
Route::delete('/lands/{id}', [LandController::class, 'destroy'])->name('lands.destroy');

Route::get('/lands/{id}', [LandController::class, 'show'])->name('lands.show');

Route::get('/lands/{id}/edit', [LandController::class, 'edit'])->name('lands.edit');

Route::post('/lands/{land}/histories', [LandHistoryController::class, 'store'])->name('land.histories.store');

Route::get('/land-histories/{id}/edit', [LandHistoryController::class, 'edit'])->name('land.histories.edit');

Route::put('/land-histories/{id}', [LandHistoryController::class, 'update'])->name('land.histories.update');

Route::delete('/land-histories/{id}', [LandHistoryController::class, 'destroy'])->name('land.histories.destroy');