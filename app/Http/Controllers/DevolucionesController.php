<?php

namespace App\Http\Controllers;

use App\Models\Devolucione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevolucionesController extends Controller
{
    public function devolucion()
    {
        // Esta consulta es para que al enviar los datos, solo se muestren los pedidos en el formulario
        $devolucion = DB::select("SELECT dev.fecha_devolucion, rem.idRecepcion_mercancia, sumi.nombre_suministro, dev.status, dev.cantidad_devuelta, dev.motivo, emp.nombre_empleado, emp.apellido_empleado FROM devoluciones dev 
        JOIN recepciones_mercancias rem ON rem.idRecepcion_mercancia = dev.Recepciones_mercancias_idRecepcion_mercancia
        JOIN suministros sumi ON sumi.idSuministro = dev.Suministros_idSuministro
        JOIN empleados emp ON emp.idEmpleados = dev.Emplados_idEmplados
        WHERE 1;");
        
        $empleado = DB::select("SELECT * FROM `empleados` WHERE 1");
        $recepcion = DB::select("SELECT * FROM `recepciones_mercancias` WHERE 1");
        $suministro = DB::select("SELECT * FROM `suministros` WHERE 1");
    
        // Esta función almacena en la vista de devolucion
        return view("devolucion", ['devo' => $devolucion, 'emp' => $empleado, 'rec' => $recepcion, 'sum' => $suministro]);
    }

    public function create(Request $request)
    {
        // Validaciones de la interfaz devoluciones
        $validatedData = $request->validate([
            'fecha_devolucion' => 'required|date',
            'status' => 'required|string|max:255',
            'cantidad_devuelta' => 'required|integer|min:1|max:500',
            'motivo' => 'required|string|max:100',
            'recepcion' => 'required|exists:recepciones_mercancias,idRecepcion_mercancia',
            'suministro' => 'required|exists:suministros,idSuministro',
            'empleado' => 'required|exists:empleados,idEmpleados',
        ], [
            'fecha_devolucion.required' => 'La fecha de devolución es obligatoria.',
            'fecha_devolucion.date' => 'La fecha de devolución debe ser una fecha válida.',
            'status.required' => 'El estado es obligatorio.',
            'status.string' => 'El estado debe ser una cadena de texto.',
            'status.max' => 'El estado no debe exceder los 100 caracteres.',
            'cantidad_devuelta.required' => 'La cantidad devuelta es obligatoria.',
            'cantidad_devuelta.integer' => 'La cantidad devuelta debe ser un número entero.',
            'cantidad_devuelta.min' => 'La cantidad devuelta debe ser al menos 1.',
            'cantidad_devuelta.max' => 'La cantidad devuelta no puede exceder los 500 suministros.',
            'motivo.required' => 'El motivo es obligatorio.',
            'motivo.string' => 'El motivo debe ser una cadena de texto.',
            'motivo.max' => 'El motivo no debe exceder los 255 caracteres.',
            'recepcion.required' => 'La recepción de mercancía es obligatoria.',
            'recepcion.exists' => 'La recepción de mercancía seleccionada no existe.',
            'suministro.required' => 'El suministro es obligatorio.',
            'suministro.exists' => 'El suministro seleccionado no existe.',
            'empleado.required' => 'El empleado es obligatorio.',
            'empleado.exists' => 'El empleado seleccionado no existe.',
        ]);
    
        // Validación para evitar duplicación de ID de recepción de mercancía
        $existeDevolucion = DB::table('devoluciones')
            ->where('Recepciones_mercancias_idRecepcion_mercancia', $request->input('recepcion'))
            ->exists();
    
        if ($existeDevolucion) {
            return redirect()->back()->withErrors(['recepcion' => 'Ya existe una devolución registrada con este ID de recepción de mercancía.']);
        }

        try {
            // Inserción en la tabla devoluciones
            $devolucion = DB::table('devoluciones')->insertGetId([
                'fecha_devolucion' => $validatedData['fecha_devolucion'],
                'status' => $validatedData['status'],
                'cantidad_devuelta' => $validatedData['cantidad_devuelta'],
                'motivo' => $validatedData['motivo'],
                'Emplados_idEmplados' => $request->input('empleado'),
                'Recepciones_mercancias_idRecepcion_mercancia' => $request->input('recepcion'),
                'Suministros_idSuministro' => $request->input('suministro'),
            ]);
    
            // Redirigir con un mensaje de éxito
            return redirect()->back()->with('success', 'Devolución creada exitosamente.');
    
        } catch (\Throwable $th) {
            // Redirigir con un mensaje de error
            return redirect()->back()->with('danger', 'Error en envío: ' . $th->getMessage());
        }
    }

    // Método para eliminar una devolución
    public function destroyByRecepcionId($idRecepcion)
{
    // Busca la devolución por idRecepcion_mercancia
    $devolucion = Devolucione::where('Recepciones_mercancias_idRecepcion_mercancia', $idRecepcion)->first();

    if ($devolucion) {
        $devolucion->delete();
        return redirect()->route('devolucion')->with('success', 'Devolución eliminada correctamente.');
    }

    return redirect()->route('devolucion')->with('error', 'Devolución no encontrada.');
}
    }
