<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\proveedorController;

// Ruta proveedor
Route::get('/', [proveedorController::class, 'create'])->name('proveedor');
Route::get('/proveedor', [proveedorController::class, 'create'])->name('proveedor.create');
Route::post('/proveedor', [proveedorController::class, 'store'])->name('proveedor.store');


// Ruta ordencompra
Route::get('/ordencompra', function () {
    return view('ordencompra');
})->name('ordencompra');

// Ruta recepcion
Route::get('/recepcion', function () {
    return view('recepcion');
})->name('recepcion');

// Ruta devolucion
Route::get('/devolucion', function () {
    return view('devolucion');
})->name('devolucion');


