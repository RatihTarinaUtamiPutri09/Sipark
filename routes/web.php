<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ParkingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/dashboard', [VehicleController::class, 'dashboard'])->name('dashboard');
// Rute untuk kendaraan
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
Route::get('/vehicles/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::put('/vehicles/{vehicle}', [VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('/vehicles/{vehicle}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');

// Rute untuk parkir
Route::get('/parkings', [ParkingController::class, 'index'])->name('parkings.index');
Route::get('/parkings/create', [ParkingController::class, 'create'])->name('parkings.create');
Route::post('/parkings', [ParkingController::class, 'store'])->name('parkings.store');
Route::get('/parkings/{parking}/edit', [ParkingController::class, 'edit'])->name('parkings.edit');
Route::put('/parkings/{parking}', [ParkingController::class, 'update'])->name('parkings.update');
Route::delete('/parkings/{parking}', [ParkingController::class, 'destroy'])->name('parkings.destroy');

// Rute utama
Route::get('/', function () {
    return redirect()->route('dashboard'); // Redirect ke halaman kendaraan
});
