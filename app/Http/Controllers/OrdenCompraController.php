<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\OrdenesCompra;
use App\Models\ProveedoresHasSuministro;
use App\Models\Proveedore;
use App\Models\Suministro;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


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

    public function pdf($id){
        $ordenCompra = OrdenesCompra::findOrFail($id);
        $pdf = Pdf::loadView('ordencompra.pdf', compact('ordenCompra'));
        return $pdf->stream('ordencompra_' . $ordenCompra->id . '.pdf');
    }
    
    public function store(Request $request)
    {
         $request->validate([
            'fecha_emision' =>'required|date|after_or_equal:today',
            'fecha_entraga' => 'required|date|after_or_equal:today',
            'Empleados_idEmpleados' => 'required|exists:empleados,idEmpleados',
            'Suministros_idSuministro' => 'required|exists:suministros,idSuministro',
            'Proveedores_idProveedores' => 'required|exists:proveedores,idProveedores',
            'cantidad_pedida' => 'required|numeric|min:1',
            'cantidad_total' => 'required|numeric|min:1',
       
        ], [
            'fecha_emision.after_or_equal' => 'La fecha de emision no puede ser antes de la fecha actual',
            'fecha_emision.required' => 'La fecha de emision es obligatoria.',
            'fecha_entraga.required' => 'La fecha de entrega es obligatoria.',
            'fecha_entraga.after_or_equal' => 'La fecha de entrega no puede ser antes de la fecha actual',
            'Empleados_idEmpleados.required' => 'El empleado es obligatorio.',
            'Empleados_idEmpleados.exists' => 'El empleado seleccionado no existe.',
            'Proveedores_idProveedores.required' => 'El proveedor es obligatorio.',
            'Proveedores_idProveedores.exists' => 'El proveedor seleccionado no existe.',
            'Suministros_idSuministro.required' => 'Los suministros son obligatorios.',
            'cantidad_pedida.min' => 'La cantidad debe ser un valor positivo.',
            'cantidad_pedida.required' => 'El cantidad es obligatoria.',
            'cantidad_total.required' => 'La cantidad total es obligatoria.',

        ]);

        $ordenCompra = new OrdenesCompra();
        $ordenCompra->fecha_emision = $request->input('fecha_emision');
        $ordenCompra->fecha_entraga = Carbon::now();
        $ordenCompra->Empleados_idEmpleados = $request->input('Empleados_idEmpleados');
        $ordenCompra->Suministros_idSuministro = $request->input('Suministros_idSuministro');
        $ordenCompra->Proveedores_idProveedores = $request->input('Proveedores_idProveedores');
        $ordenCompra->cantidad_pedida = $request->input('cantidad_pedida');
        $ordenCompra->cantidad_total = $request->input('cantidad_total');
        $ordenCompra->save();

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

    public function delete($id)
    {
        $ordenCompra = OrdenesCompra::find($id);
    
        if ($ordenCompra) {
            // Simplemente elimina la orden de compra
            $ordenCompra->delete();
    
            return back()->with('success', 'Orden de compra eliminada con éxito');
        } else {
            return back()->with('error', 'Orden de compra no encontrada');
        }
    }
    
    public function edit($id)
    {
        $ordenCompra = OrdenesCompra::find($id);
        if (!$ordenCompra) {
            return redirect()->route('ordencompra.create')->with('error', 'Orden de compra no encontrada.');
        }
    
        $empleados = Empleado::all();
        $suminis = Suministro::all();
        $pro = Proveedore::all();
        return view('ordencompraedit', compact('empleados', 'suminis', 'pro', 'ordenCompra'));
    }
    
public function update(Request $request, $id)
{
    $request->validate([
        'fecha_emision' =>'required|date|after_or_equal:today',
        'fecha_entraga' => 'required|date|after_or_equal:today',
        'Empleados_idEmpleados' => 'required|exists:empleados,idEmpleados',
        'Suministros_idSuministro' => 'required|exists:suministros,idSuministro',
        'Proveedores_idProveedores' => 'required|exists:proveedores,idProveedores',
        'cantidad_pedida' => 'required|numeric|min:1',
        'cantidad_total' => 'required|numeric|min:1',
   
    ], [
        'fecha_emision.after_or_equal' => 'La fecha de emision no puede ser antes de la fecha actual',
        'fecha_emision.required' => 'La fecha de emision es obligatoria.',
        'fecha_entraga.required' => 'La fecha de entrega es obligatoria.',
        'fecha_entraga.after_or_equal' => 'La fecha de entrega no puede ser antes de la fecha actual',
        'Empleados_idEmpleados.required' => 'El empleado es obligatorio.',
        'Empleados_idEmpleados.exists' => 'El empleado seleccionado no existe.',
        'Proveedores_idProveedores.required' => 'El proveedor es obligatorio.',
        'Proveedores_idProveedores.exists' => 'El proveedor seleccionado no existe.',
        'Suministros_idSuministro.required' => 'Los suministros son obligatorios.',
        'cantidad_pedida.min' => 'La cantidad debe ser un valor positivo.',
        'cantidad_pedida.required' => 'El cantidad es obligatoria.',
        'cantidad_total.required' => 'La cantidad total es obligatoria.',

    ]);

    $ordenCompra = OrdenesCompra::findOrFail($id);

    $ordenCompra->fecha_emision = $request->input('fecha_emision');
    $ordenCompra->fecha_entraga = Carbon::now();
    $ordenCompra->Empleados_idEmpleados = $request->input('Empleados_idEmpleados');
    $ordenCompra->Suministros_idSuministro = $request->input('Suministros_idSuministro');
    $ordenCompra->Proveedores_idProveedores = $request->input('Proveedores_idProveedores');
    $ordenCompra->cantidad_pedida = $request->input('cantidad_pedida');
    $ordenCompra->cantidad_total = $request->input('cantidad_total');
    $ordenCompra->save();

    return redirect()->route('ordencompra.create')->with('success', 'La Orden de compra ha sido actualizada correctamente');
}
}