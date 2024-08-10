<?php

use Illuminate\Support\Facades\Route;

// Ruta proveedor
Route::get('/proveedor', function () {
    return view('proveedor');
})->name('proveedor');;

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


