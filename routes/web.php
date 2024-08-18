<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\proveedorController;
use App\Http\Controllers\OrdenCompraController;
use App\Http\Controllers\RecepcionController;
use App\Http\Controllers\DevolucionesController;
use App\Http\Controllers\empleadosController;

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

Route::get('ordencompra/pdf', [OrdenCompraController::class, 'pdf'])->name('ordencompra.pdf');
Route::get('ordencompra', [OrdenCompraController::class, 'create'])->name('ordencompra');
Route::post('ordencompra', [OrdenCompraController::class, 'store'])->name('ordencompra.store');
Route::get('/ordencompra/create', [OrdenCompraController::class, 'create'])->name('ordencompra.create');
Route::delete('/ordencompra/{id}', [OrdenCompraController::class, 'delete'])->name('ordencompra.delete');
Route::get('/ordencompra/{ordencompra}/edit', [OrdenCompraController::class, 'edit'])->name('ordencompra.edit');
Route::put('/ordencompra/{id}', [OrdenCompraController::class, 'update'])->name('ordencompra.update');


// Ruta recepcion
Route::get('/recepcion', function () {
    return view('recepcion');
})->name('recepcion');

Route::get('/recepcion', [RecepcionController::class, 'index'])->name('recepcion');
Route::post('/recepcion/create', [RecepcionController::class, 'create'])->name('recepcion.create');

// Ruta devolucion
Route::get('/devolucion', function () {
    return view('devolucion');
})->name('devolucion');

Route::get('/devolucion', [DevolucionesController::class, 'devolucion'])->name('devolucion');
Route::post('/devolucion/create', [DevolucionesController::class, 'create'])->name('devolucion.create');


// Ruta empleados
Route::get('/empleados', function () {
    return view('empleados');
})->name('empleados');

Route::get('empleados', [empleadosController::class, 'create'])->name('empleados');
Route::get('/empleados/create', [empleadosController::class, 'create'])->name('empleados.create');
Route::post('empleados', [empleadosController::class, 'store'])->name('empleados.store');
Route::delete('/empleados/{id}', [empleadosController::class, 'delete'])->name('empleados.delete');
Route::get('/empleados/{empleados}/edit', [empleadosController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/{id}', [empleadosController::class, 'update'])->name('empleados.update');

