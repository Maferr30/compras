<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\OrdenCompraController;
use App\Http\Controllers\DevolucionesController;

// Ruta proveedor
Route::get('/', [proveedorController::class, 'create'])->name('proveedor');
Route::get('/proveedor', [proveedorController::class, 'create'])->name('proveedor.create');
Route::post('/proveedor', [proveedorController::class, 'store'])->name('proveedor.store');
Route::get('/proveedor/{proveedor}/edit', [proveedorController::class, 'edit'])->name('proveedor.edit');
Route::put('/proveedor/{id}', [proveedorController::class, 'update'])->name('proveedor.update');
Route::delete('/proveedor/{id}', [proveedorController::class, 'delete'])->name('proveedor.delete');


// Ruta ordencompra
Route::get('/ordencompra', function () {
    return view('ordencompra');
})->name('ordencompra');

Route::get('ordencompra', [OrdenCompraController::class, 'create'])->name('ordencompra');
Route::post('ordencompra', [OrdenCompraController::class, 'store'])->name('ordencompra.store');
Route::get('/ordencompra/create', [OrdenCompraController::class, 'create'])->name('ordencompra.create');

// Ruta recepcion
Route::get('/recepcion', function () {
    return view('recepcion');
})->name('recepcion');

// Ruta devolucion
Route::get('/devolucion', function () {
    return view('devolucion');
})->name('devolucion');

Route::get('/devolucion', [DevolucionesController::class, 'devolucion'])->name('devolucion');
Route::post('/devolucion/create', [DevolucionesController::class, 'create'])->name('devolucion.create');
