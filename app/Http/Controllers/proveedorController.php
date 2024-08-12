<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use App\Models\Categoria;
use App\Models\Suministro;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function create()
    {
        $categorias = Categoria::all();
        $sumi = Suministro::all();
        $proveedores = Proveedore::with('categorias')->get();
        return view('proveedor', compact('categorias', 'proveedores', 'sumi' ));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nombre_empresa' => 'required|string|max:255',
        'telefono_proveedor' => 'required|regex:/^[0-9]+$/|max:15|unique:proveedores,telefono_proveedor',
        'direccion_empresa' => 'required|string|max:255',
        'correo_proveedor' => 'required|email|unique:proveedores,correo_proveedor|max:255',
        'rif' => 'required|string|unique:proveedores,rif|regex:/^[JGVE]-\d{8}-\d$/',
        'categorias' => 'required|array|min:1',
        'categorias.*' => 'exists:categorias,idcategorias',
    ], [
        'nombre_empresa.required' => 'El nombre de la empresa es obligatorio.',
        'telefono_proveedor.required' => 'El teléfono del proveedor es obligatorio.',
        'telefono_proveedor.unique' => 'El teléfono del proveedor ya está registrado.',
        'rif.required' => 'El RIF es obligatorio.',
        'rif.unique' => 'Este RIF ya está registrado.',
        'rif.regex' => 'El formato del RIF no es válido. Debe ser J-12345678-9.',
        'direccion_empresa.required' => 'La dirección de la empresa es obligatoria.',
        'correo_proveedor.required' => 'El correo del proveedor es obligatorio.',
        'correo_proveedor.email' => 'El correo del proveedor debe ser una dirección válida.',
        'correo_proveedor.unique' => 'Este correo del proveedor ya está registrado.',
        'categorias.required' => 'Debe seleccionar al menos una categoría.',
        'categorias.*.exists' => 'Una de las categorías seleccionadas no es válida.',
    ]);  

    $proveedor = new Proveedore;
    $proveedor->nombre_empresa = $validatedData['nombre_empresa'];
    $proveedor->telefono_proveedor = $validatedData['telefono_proveedor'];
    $proveedor->rif = $validatedData['rif'];
    $proveedor->direccion_empresa = $validatedData['direccion_empresa']; 
    $proveedor->correo_proveedor = $validatedData['correo_proveedor'];
    $proveedor->save();

    $proveedor->categorias()->attach($validatedData['categorias']);
    $proveedor->suministros()->attach($validatedData['Suministro_idSuministro']);

    return redirect()->route('proveedor.create')->with('success', 'Proveedor registrado exitosamente');
}

}