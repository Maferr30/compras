<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\OrdenesCompra;
use App\Models\Proveedore;
use App\Models\Suministro;

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
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'fecha_emision' => 'required|date',
            'fecha_entrega' => 'required|date',
            'empleados_idempleados' => 'required|exists:empleados,id', 
            'proveedores_idproveedores' => 'required|exists:proveedores,id',
            'suministros_idsuministro' => 'required|exists:suministros,id',
            'cantidad_pedida' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'total_pagar' => 'required|numeric|min:0',
        ]);

        // Crear un nuevo objeto de la clase OrdenesCompra
        $ordenCompra = new OrdenesCompra();

        // Asignar los valores de los campos a las propiedades del objeto
        $ordenCompra->fecha_emision = $validatedData['fecha_emision'];
        $ordenCompra->fecha_entrega = $validatedData['fecha_entrega'];
        $ordenCompra->empleados_idempleados = $validatedData['empleados_idempleados'];
        $ordenCompra->proveedores_idproveedores = $validatedData['proveedores_idproveedores'];
        $ordenCompra->suministros_idsuministro = $validatedData['suministros_idsuministro'];
        $ordenCompra->cantidad_pedida = $validatedData['cantidad_pedida'];
        $ordenCompra->precio_unitario = $validatedData['precio_unitario'];
        $ordenCompra->total_pagar = $validatedData['total_pagar'];

        // Generar el número de orden
        $ordenCompra->numero_orden = $this->generarNumeroOrden();

        // Guardar el objeto en la base de datos
        $ordenCompra->save();

        // Redireccionar a la vista de ordenes de compra con un mensaje de éxito
        return redirect()->route('ordencompra.create')->with('success', 'Orden de compra creada correctamente.');
    }

    private function generarNumeroOrden()
    {
        // Obtener el último número de orden de compra
        $ultimoNumeroOrden = OrdenesCompra::latest('numero_orden')->first();

        // Si no hay registros, iniciar el número de orden en 1
        if (!$ultimoNumeroOrden) {
            return 1;
        }

        // Incrementar el número de orden en 1
        return $ultimoNumeroOrden->numero_orden + 1;
    }
}