<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class empleadosController extends Controller
{
    public function create()
    {
        $empleados = Empleado::all();
        return view('empleados', compact('empleados'));
    } 

    public function store(Request $request)
    {
        // Validación
        $validator = Validator::make($request->all(), [
            'nombre_empleado' => 'required|string|max:255',
            'apellido_empleado' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'cedula' => 'required|numeric|digits_between:7,10|unique:empleados,cedula',
            'telefono_empleado' => 'required|numeric|digits_between:10,15',
            'direccion_empleado' => 'required|string|max:255',
        ], [
            'nombre_empleado.required' => 'El nombre del empleado es obligatorio.',
            'nombre_empleado.string' => 'El nombre del empleado debe ser una cadena de caracteres.',
            'nombre_empleado.max' => 'El nombre del empleado no debe tener más de 255 caracteres.',
            'apellido_empleado.required' => 'El apellido del empleado es obligatorio.',
            'apellido_empleado.string' => 'El apellido del empleado debe ser una cadena de caracteres.',
            'apellido_empleado.max' => 'El apellido del empleado no debe tener más de 255 caracteres.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento no es válida.',
            'cedula.required' => 'La cédula es obligatoria.',
            'cedula.numeric' => 'La cédula debe ser un número.',
            'cedula.digits_between' => 'La cédula debe tener entre 7 y 10 dígitos.',
            'cedula.unique' => 'La cédula ya ha sido registrada.',
            'telefono_empleado.required' => 'El teléfono del empleado es obligatorio.',
            'telefono_empleado.numeric' => 'El teléfono del empleado debe ser un número.',
            'telefono_empleado.digits_between' => 'El teléfono del empleado debe tener entre 10 y 15 dígitos.',
            'direccion_empleado.required' => 'La dirección del empleado es obligatoria.',
            'direccion_empleado.string' => 'La dirección del empleado debe ser una cadena de caracteres.',
            'direccion_empleado.max' => 'La dirección del empleado no debe tener más de 255 caracteres.',
        ]);
        

        if ($validator->fails()) {
            return redirect()->route('empleados.create')
                ->withErrors($validator)
                ->withInput();
        }

        Empleado::create([
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
        $empleado = Empleado::find($id);
    
        if ($empleado) {
            $empleado->delete();
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
    $validator = Validator::make($request->all(), [
        'nombre_empleado' => 'required|string|max:255',
        'apellido_empleado' => 'required|string|max:255',
        'fecha_nacimiento' => 'required|date',
        'cedula' => 'required|numeric|digits_between:7,10|unique:empleados,cedula',
        'telefono_empleado' => 'required|numeric|digits_between:10,15',
        'direccion_empleado' => 'required|string|max:255',
    ], [
        'nombre_empleado.required' => 'El nombre del empleado es obligatorio.',
        'nombre_empleado.string' => 'El nombre del empleado debe ser una cadena de caracteres.',
        'nombre_empleado.max' => 'El nombre del empleado no debe tener más de 255 caracteres.',
        'apellido_empleado.required' => 'El apellido del empleado es obligatorio.',
        'apellido_empleado.string' => 'El apellido del empleado debe ser una cadena de caracteres.',
        'apellido_empleado.max' => 'El apellido del empleado no debe tener más de 255 caracteres.',
        'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
        'fecha_nacimiento.date' => 'La fecha de nacimiento no es válida.',
        'cedula.required' => 'La cédula es obligatoria.',
        'cedula.numeric' => 'La cédula debe ser un número.',
        'cedula.digits_between' => 'La cédula debe tener entre 7 y 10 dígitos.',
        'cedula.unique' => 'La cédula ya ha sido registrada.',
        'telefono_empleado.required' => 'El teléfono del empleado es obligatorio.',
        'telefono_empleado.numeric' => 'El teléfono del empleado debe ser un número.',
        'telefono_empleado.digits_between' => 'El teléfono del empleado debe tener entre 10 y 15 dígitos.',
        'direccion_empleado.required' => 'La dirección del empleado es obligatoria.',
        'direccion_empleado.string' => 'La dirección del empleado debe ser una cadena de caracteres.',
        'direccion_empleado.max' => 'La dirección del empleado no debe tener más de 255 caracteres.',
    ]);

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