<?php

namespace App\Http\Controllers;
use App\Models\RecepcionesMercancia;
use App\Models\Empleado;
use App\Models\Proveedore;
use App\Models\OrdenesCompra;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RecepcionController extends Controller
{
    public function index()
    {
        $recepcion = DB::select("SELECT rem.fecha_recepcion, orc.idOrden_compra, emp.nombre_empleado, emp.apellido_empleado, pro.nombre_empresa, sumi.nombre_suministro, rem.cantidad_recibida, rem.status
FROM recepciones_mercancias rem 
JOIN ordenes_compras orc ON orc.idOrden_compra = rem.Ordenes_compras_idOrden_compra
JOIN empleados emp ON emp.idEmpleados = rem.Empleados_idEmpleados
JOIN proveedores pro ON pro.idProveedores = orc.Proveedores_idProveedores
JOIN suministros sumi ON sumi.idSuministro = orc.Suministros_idSuministro
WHERE 1;");
        $ordenCompra = DB::select("SELECT * FROM `ordenes_compras` WHERE 1");
        $empleado = DB::select("SELECT * FROM `empleados` WHERE 1");
        $proveedor = DB::select("SELECT * FROM `proveedores` WHERE 1");

        return view('recepcion', ['orc' => $ordenCompra, 'emp' => $empleado, 'pro' => $proveedor, 'repc' =>$recepcion]);
    }
    public function create(Request $request)
    {
        // Validaciones de la interfaz recepciones :D
        $validatedData = $request->validate([
            'fecha_recepcion' => 'required|date',
            'status' => 'required|string|max:50',
            'cantidad' => 'required|integer|min:1|max:500',
            'Empleados_idEmpleados' => 'required|exists:empleados,idEmpleados',
            'idOrden_compra' => 'required|exists:ordenes_compras,idOrden_compra',
        ], [
            'fecha_recepcion.required' => 'La fecha de recepción es obligatoria.',
            'fecha_recepcion.date' => 'La fecha de recepción debe ser una fecha válida.',
            'status.required' => 'El estado es obligatorio.',
            'status.string' => 'El estado debe ser una cadena de texto.',
            'status.max' => 'El estado no puede tener más de 50 caracteres.',
            'cantidad.required' => 'La cantidad recibida es obligatoria.',
            'cantidad.integer' => 'La cantidad recibida debe ser un número entero.',
            'cantidad.min' => 'La cantidad recibida debe ser al menos 1.',
            'cantidad.max' => 'La cantidad recibida no puede ser más de 500.',
            'Empleados_idEmpleados.required' => 'Debe seleccionar un empleado.',
            'Empleados_idEmpleados.exists' => 'El empleado seleccionado no es válido.',
            'idOrden_compra.required' => 'Debe seleccionar una orden de compra.',
            'idOrden_compra.exists' => 'La orden de compra seleccionada no es válida.',
        ]);

        // Validación para evitar duplicación de ID de orden de compra
        $existeOrdenCompra = DB::table('recepciones_mercancias')
            ->where('Ordenes_compras_idOrden_compra', $request->input('idOrden_compra'))
            ->exists();
    
        if ($existeOrdenCompra) {
            return redirect()->back()->withErrors(['idOrden_compra' => 'Ya existe una recepción registrada con esta orden de compra.']);
        }
    
        try {
            // Inserción en la tabla recepcion de mercancia
            $recepcion = DB::table('recepciones_mercancias')->insertGetId([
                'fecha_recepcion' => $request->input('fecha_recepcion'),
                'status' => $request->input('status'),
                'cantidad_recibida' => $request->input('cantidad'),
                'Empleados_idEmpleados' => $request->input('Empleados_idEmpleados'),
                'Ordenes_compras_idOrden_compra' => $request->input('idOrden_compra'),
            ]);
    
            // Redirigir con un mensaje de éxito
            return redirect()->back()->with('success', 'Recepción creada exitosamente.');
        } catch (\Throwable $th) {
            // Redirigir con un mensaje de error
            return redirect()->back()->with('danger', 'Error en envío: ' . $th->getMessage());
        }
    }   

    // Método para eliminar una recepcion

    public function destroyByCompraId($idCompra)
    {
        // Busca la recepcion por la ID de orden de compra
        $recepcion = RecepcionesMercancia::where('Ordenes_compras_idOrden_compra', $idCompra)->first();
    
        if ($recepcion) {
            $recepcion->delete();
             // Se elimina la recepcion correctamente como debe ser 
            return redirect()->route('recepcion')->with('success', 'Recepción eliminada correctamente.');
        }

        return redirect()->route('recepcion')->with('error', 'Recepción no encontrada.');
    }
}