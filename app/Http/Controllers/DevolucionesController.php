<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevolucionesController extends Controller
{
    public function devolucion()
    {
        // Esta consulta es para que al enviar los datos, solo se muestren los pedidos en el formulario
        $devolucion = DB::select("SELECT dev.fecha_devolucion,rem.idRecepcion_mercancia, sumi.nombre_suministro, dev.status, dev.cantidad_devuelta, dev.motivo, emp.nombre_empleado, emp.apellido_empleado FROM devoluciones dev 
JOIN recepciones_mercancias rem ON rem.idRecepcion_mercancia = dev.Recepciones_mercancias_idRecepcion_mercancia
JOIN suministros sumi ON sumi.idSuministro = dev.Suministros_idSuministro
JOIN empleados emp ON emp.idEmpleados = dev.Emplados_idEmplados
WHERE 1;");
          $empleado = DB::select("SELECT * FROM `empleados` WHERE 1");
          $recepcion = DB::select("SELECT * FROM `recepciones_mercancias` WHERE 1");
          $suministro = DB::select("SELECT * FROM `suministros` WHERE 1");
  
          // Esta función almacena en la vista de devolucion
          return view("devolucion", [ 'devo'=>$devolucion, 'emp' => $empleado, 'rec' => $recepcion, 'sum' => $suministro]);
      }
  
      public function create(Request $request)
      {
          // Validaciones
          $validatedData = $request->validate([
              'fecha_devolucion' => 'required|date',
              'status' => 'required|string|max:255',
              'cantidad_devuelta' => 'required|integer|min:1',
              'motivo' => 'required|string|max:255',// Usar el nombre correcto de la columna
          ]);
  
          try {
              // Inserción en la tabla devoluciones
              $devolucion = DB::table('devoluciones')->insertGetId([
                  'fecha_devolucion' => $validatedData['fecha_devolucion'],
                  'status' => $validatedData['status'],
                  'cantidad_devuelta' => $validatedData['cantidad_devuelta'],
                  'motivo' => $validatedData['motivo'],
                  'Emplados_idEmplados' => $request-> input('empleado'),
                  'Recepciones_mercancias_idRecepcion_mercancia' => $request-> input('recepcion'),
                  'Suministros_idSuministro' => $request-> input('suministro'),
              ]);
  
              // Redirigir con un mensaje de éxito
              return redirect()->back()->with('success', 'Devolución creada exitosamente.');
  
          } catch (\Throwable $th) {
              // Redirigir con un mensaje de error
              return redirect()->back()->with('danger', 'Error en envío: ' . $th->getMessage());
          }
      }
  }