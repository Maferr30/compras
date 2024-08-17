<?php

namespace App\Http\Controllers;

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
        try {
            // Inserción en la tabla recepcion
            $recepcion = DB::table('recepciones_mercancias')->insertGetId([
                'fecha_recepcion' => $request->input('fecha_recepcion'),
                'status' => $request->input('status'),
                'cantidad_recibida' => $request->input('cantidad'),
                'Empleados_idEmpleados' => $request->input('Empleados_idEmpleados'),
                'Ordenes_compras_idOrden_compra' => $request->input('idOrden_compra'),
            ]);

            // Redirigir con un mensaje de éxito
            return redirect()->back()->with('success', 'Recepcion creada exitosamente.');
        } catch (\Throwable $th) {
            // Redirigir con un mensaje de error
            return redirect()->back()->with('danger', 'Error en envío: ' . $th->getMessage());
        }
    }
}
