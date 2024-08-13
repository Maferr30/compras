<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\OrdenesCompra;
use App\Models\Proveedore;
use App\Models\Suministro;
use Carbon\Carbon;

class OrdenCompraController extends Controller
{   
    public function create()
    {
        $ordenesCompra = OrdenesCompra::with(['proveedore', 'empleado', 'suministro'])->get();
        $empleados = Empleado::all();
        $pro = Proveedore::all();
        $suminis = Suministro::all();
        return view('ordencompra', compact('empleados', 'pro', 'ordenesCompra', 'suminis'));
    }
    public function store(Request $request)
    {

       $ordenCompra = new OrdenesCompra;
       $ordenCompra->fecha_emision = Carbon::now();
       $ordenCompra->fecha_entraga = Carbon::now();
       $ordenCompra->Empleados_idEmpleados = $request['Empleados_idEmpleados'];
       $ordenCompra->Proveedores_idProveedores = $request['Proveedores_idProveedores'];
       $ordenCompra->Suministros_idSuministro = $request['Suministros_idSuministro']; 
       $ordenCompra->cantidad_pedida = $request['cantidad'];
       $ordenCompra->precio_unitario = $request['Precio unitario'];
       $ordenCompra->total_pagar = $request['Total'];
       $ordenCompra->save();

    return redirect()->route('ordencompra.create')->with('success', 'Orden de compra registrada exitosamente');
}

}