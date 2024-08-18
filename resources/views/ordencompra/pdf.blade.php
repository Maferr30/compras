<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>Orden de Compra</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Proveedor</title>
</head>
<body>
    
<table class="min-w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                <tr>
                    <th scope="col" class="px-4 py-3">Fecha Emision</th>
                    <th scope="col" class="px-4 py-3">Proveedor</th>
                    <th scope="col" class="px-4 py-3">Suministro</th>
                    <th scope="col" class="px-4 py-3">Cantidad</th>
                    <th scope="col" class="px-4 py-3">Cantidad Total</th>
                    <th scope="col" class="px-4 py-3">Empleado</th>
                </tr>
            </thead>
            <tbody>

            @foreach($ordenesCompra as $ordenCompra)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">{{$ordenCompra->fecha_emision->format('d-m-Y') }}</th>
                    <td class="px-4 py-3 text-gray-900">{{ $ordenCompra->proveedore->nombre_empresa }}</td>
                    <td class="px-4 py-3 text-gray-900">{{ $ordenCompra->suministro->nombre_suministro }}</td>
                    <td class="px-4 py-3 text-gray-900">{{ $ordenCompra->cantidad_pedida }}</td>
                    <td class="px-4 py-3 text-gray-900">{{ number_format($ordenCompra->cantidad_total, 2) }}</td>
                    <td class="px-4 py-3 text-gray-900">{{ $ordenCompra->empleado->nombre_empleado }} {{ $ordenCompra->empleado->apellido_empleado }}</td>

            @endforeach
            </tbody>
        </table>

</body>
</html>