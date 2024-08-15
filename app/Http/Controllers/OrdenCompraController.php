<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\OrdenesCompra;
use App\Models\ProveedoresHasSuministro;
use App\Models\Proveedore;
use App\Models\Suministro;
use Carbon\Carbon;

class OrdenCompraController extends Controller
{   
    public function create()
    {

    $ordenesCompra = OrdenesCompra::with(['proveedore', 'empleado','suministro' ])->get();
    $empleados = Empleado::all();
    $pro = Proveedore::all();
    $suminis = Suministro::all();
    return view('ordencompra', compact('empleados', 'suminis', 'pro', 'ordenesCompra'));

    
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'fecha_entraga' => 'required|date|after_or_equal:today',
           'Empleados_idEmpleados' => 'required|exists:empleados,idEmpleados',
           'Proveedores_idProveedores' => 'required|exists:proveedores,idProveedores',
           'Suministros_idSuministro' => 'required|array',
           'cantidad_pedida' => 'required|array',
           'precio_unitario' => 'required|array',
           'total_pagar' => 'required|array',
       ], [
           'fecha_entraga.after_or_equal' => 'La fecha de entrega no puede ser antes de la fecha actual',
           'fecha_entraga.required' => 'La fecha de entrega es obligatoria.',
           'fecha_entraga.date' => 'La fecha de entrega debe ser una fecha válida.',
           'Empleados_idEmpleados.required' => 'El empleado es obligatorio.',
           'Empleados_idEmpleados.exists' => 'El empleado seleccionado no existe.',
           'Proveedores_idProveedores.required' => 'El proveedor es obligatorio.',
           'Proveedores_idProveedores.exists' => 'El proveedor seleccionado no existe.',
           'Suministros_idSuministro.required' => 'Los suministros son obligatorios.',
           'cantidad_pedida.required' => 'Las cantidades son obligatorias.',
           'cantidad_pedida.min' => 'La cantidad pedida debe ser un valor positivo.',
           'precio_unitario.required' => 'El precio es obligatorio.',
           'total_pagar.required' => 'El total es obligatorio.',
       ]);

        $ordenCompra = new OrdenesCompra();
        $ordenCompra->fecha_emision = $request->input('fecha_emision');
        $ordenCompra->fecha_entraga = Carbon::now();
        $ordenCompra->Empleados_idEmpleados = $request->input('Empleados_idEmpleados');
        $ordenCompra->Suministros_idSuministro = $request->input('Suministros_idSuministro');
        $ordenCompra->Proveedores_idProveedores = $request->input('Proveedores_idProveedores');
        $ordenCompra->cantidad_pedida = $request->input('cantidad_pedida');
        $ordenCompra->precio_unitario = $request->input('precio_unitario');
        $ordenCompra->total_pagar = $request->input('total_pagar');
        $ordenCompra->save();

        $ordenCompra->enviado_at = now();

        return redirect()->route('ordencompra.create')->with('success', 'La Orden de compra ha sido creada exitosamente.');
    }

    public function getSuministrosPorProveedor($idProveedor)
    {
        $suminis = ProveedoresHasSuministro::where('Proveedores_idProveedores', $idProveedor)
            ->with('suministro')
            ->get()
            ->map(function ($item) {
                return $item->suminis;
            });
        
        return response()->json($suminis);
    }

    public function cancel($id)
    {
        $ordenCompra = OrdenesCompra::findOrFail($id);
        if (!$ordenCompra->esCancelable()) {
        return redirect()->route('ordencompra')->with('error', 'Esta orden ya no puede ser cancelada.');
    }
    $ordenCompra->save();

    return redirect()->route('ordencompra')->with('success', 'Orden de compra cancelada exitosamente');
}

}