<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use App\Models\Categoria;
use App\Models\ProveedoresHasCategoria;
use Illuminate\Http\Request;


class ProveedorController extends Controller
{
    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedore::with('categorias')->get();
        return view('proveedor', compact('categorias', 'proveedores'));
    } 

    public function store(Request $request)
    {
        $proveedore = Proveedore::create([
            'nombre_empresa' => $request->input('nombre_empresa'),
            'telefono_proveedor' => $request->input('telefono_proveedor'),
            'rif' => $request->input('rif'),
            'direccion_empresa' => $request->input('direccion_empresa'),
            'correo_proveedor' => $request->input('correo_proveedor'),
        ]);

        $proveedore->categorias()->attach($request->categorias);

        return redirect()->route('proveedor.create')->with('success', 'Proveedor creado exitosamente.');
    }
    
}