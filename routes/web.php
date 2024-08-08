<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('proveedor');
});

// Rutas para otras vistas
Route::get('/ordencompra', function () {
    return view('ordencompra');
})->name('ordencompra');

Route::get('/recepcion', function () {
    return view('recepcion');
})->name('recepcion');

Route::get('/devolucion', function () {
    return view('devolucion');
})->name('devolucion');


