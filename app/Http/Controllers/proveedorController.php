<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use App\Models\Categoria;
use App\Models\ProveedoresHasCategoria;
use Illuminate\Http\Request;


class proveedorController extends Controller
{
    public function create()
    {
        $categorias = Categoria::all();
        $proveedores = Proveedore::with('categorias')->get();
        return view('proveedor', compact('categorias', 'proveedores'));
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
            'rif.regex' => 'El formato del RIF no es válido. Debe ser J-456789329.',
            'direccion_empresa.required' => 'La dirección de la empresa es obligatoria.',
            'correo_proveedor.required' => 'El correo del proveedor es obligatorio.',
            'correo_proveedor.email' => 'El correo del proveedor debe ser una dirección válida.',
            'correo_proveedor.unique' => 'Este correo del proveedor ya está registrado.',
            'categorias.required' => 'Debe seleccionar al menos una categoría.',
            'categorias.*.exists' => 'Una de las categorías seleccionadas no es válida.',
        ]);

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
    public function delete($id)
    
    {
        $proveedor = Proveedore::find($id);

        if ($proveedor) {
            // Eliminar registros relacionados en la tabla puente
            $proveedor->categorias()->detach(); // Esto elimina todas las relaciones en la tabla puente
    
            // Eliminar el proveedor
            $proveedor->delete();
    
            return back()->with('success', 'Proveedor eliminado con éxito');
        } else {
            return back()->with('error', 'Proveedor no encontrado');
        }
    }

    public function edit($id)
    {
        $proveedor = Proveedore::find($id);
        if (!$proveedor) {
            return redirect()->route('proveedor.create')->with('error', 'Proveedor no encontrado.');
        }

        $categorias = Categoria::all();
        return view('proveedoredit', compact('proveedor', 'categorias'));
    }
    public function update(Request $request, $id)
    {
        $proveedor = Proveedore::findOrFail($id);

        $request->validate([
            'nombre_empresa' => 'required|string|max:255|unique:proveedores,nombre_empresa,'.$id.',idProveedores',
            'telefono_proveedor' => 'required|regex:/^[0-9]+$/|max:15|unique:proveedores,telefono_proveedor,'.$id.',idProveedores',
            'direccion_empresa' => 'required|string|max:255',
            'correo_proveedor' => 'required|email|max:255|unique:proveedores,correo_proveedor,'.$id.',idProveedores',
            'rif' => 'required|string|max:20|unique:proveedores,rif,'.$id.',idProveedores',
        ], [
            'nombre_empresa.required' => 'El nombre de la empresa es obligatorio.',
            'nombre_empresa.string' => 'El nombre de la empresa debe ser texto.',
            'nombre_empresa.unique' => 'Este nombre de empresa ya está registrado.',
            'telefono_proveedor.required' => 'El teléfono del proveedor es obligatorio.',
            'telefono_proveedor.max' => 'El teléfono no debe exceder los 15 dígitos.',
            'telefono_proveedor.unique' => 'Este número de teléfono ya está registrado.',
            'direccion_empresa.required' => 'La dirección de la empresa es obligatoria.',
            'correo_proveedor.required' => 'El correo del proveedor es obligatorio.',
            'correo_proveedor.email' => 'Por favor, introduce una dirección de correo válida.',
            'correo_proveedor.unique' => 'Este correo ya está registrado.',
            'rif.required' => 'El RIF es obligatorio.',
            'rif.string' => 'El RIF debe ser texto.',
            'rif.unique' => 'Este RIF ya está registrado.',
        ]);;
    
        $proveedor->update([
            'nombre_empresa' => $request->input('nombre_empresa'),
            'telefono_proveedor' => $request->input('telefono_proveedor'),
            'direccion_empresa' => $request->input('direccion_empresa'),
            'correo_proveedor' => $request->input('correo_proveedor'),
            'rif' => $request->input('rif'),
        ]);

        $proveedor->categorias()->sync($request->input('categorias'));

        return redirect()->route('proveedor.create')->with('success', 'Proveedor actualizado correctamente.');
    }
    
}