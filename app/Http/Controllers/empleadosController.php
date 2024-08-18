<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class empleadosController extends Controller
{
    public function create()
    {
        $empleados = Empleado::all();
        return view('empleados', compact('empleados'));
    } 

    public function store(Request $request)
    {
        
        $empleados = Empleado::create([
            'nombre_empleado' => $request->input('nombre_empleado'),
            'apellido_empleado' => $request->input('apellido_empleado'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'cedula' => $request->input('cedula'),
            'telefono_empleado' => $request->input('telefono_empleado'),
            'direccion_empleado' => $request->input('direccion_empleado'),
        ]);

        return redirect()->route('empleados.create')->with('success', 'Empleado creado exitosamente.');
} 

public function delete($id)
    {
        $empleados = Empleado::find($id);
    
        if ($empleados) {
    
            $empleados->delete();
    
            return back()->with('success', 'Empleado eliminado con éxito');
        } else {
            return back()->with('error', 'Empleado no encontrado');
        }
    }

    public function edit($id)
    {
        $empleado = Empleado::find($id);
        if (!$empleado) {
            return redirect()->route('empleados.create')->with('error', 'Empleado no encontrado.');
        }
    
        return view('empleadosedit', compact('empleado'));
    }    
    
public function update(Request $request, $id)
{
    $empleados = Empleado::findOrFail($id);

    $empleados->nombre_empleado = $request->input('nombre_empleado');
    $empleados->apellido_empleado = $request->input('apellido_empleado');
    $empleados->fecha_nacimiento = $request->input('fecha_nacimiento');
    $empleados->cedula = $request->input('cedula');
    $empleados->telefono_empleado = $request->input('telefono_empleado');
    $empleados->direccion_empleado = $request->input('direccion_empleado');
    $empleados->update($request->all());

    return redirect()->route('empleados.create')->with('success', 'El empleado ha sido actualizado correctamente');
}
    
} 