<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Compra</title>
    <style>
        /* Estilos generales */
        body {
            background-color: #f7fafc;
            padding: 2rem;
            font-family: sans-serif;
        }

        .container {
            max-width: 64rem;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            padding: 1.5rem;
        }

        /* Estilos del encabezado */
        .header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .header img {
            display: block;
            margin: 0 auto 1rem;
            width: 8rem;
        }

        .header h1 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2d3748;
        }

        /* Estilos de la tabla */
        table {
            width: 100%;
            text-align: left;
            color: #6b7280;
            font-size: 0.875rem;
            border-collapse: collapse;
        }

        th, td {
            padding: 0.75rem 1rem;
        }

        thead {
            background-color: #edf2f7;
            color: #4a5568;
            text-transform: uppercase;
            font-size: 0.75rem;
        }

        tr {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            font-weight: 600;
        }


        .text-gray-900 {
            color: #1a202c;
        }   
        .text-gray-600 {
            color: #718096;
        }

        /* Estilos del pie de página */
        .footer {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #718096;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <div class="header">

        <h1>Orden de Compra #{{ $ordenCompra->idOrden_compra }}</h1>
        </div>

        <!-- Tabla -->
        <table>
            
            <thead>
                <h4>Dirigido a: {{ $ordenCompra->proveedore->nombre_empresa }}</h4>
                <tr>

                    <th>Fecha Emisión</th>
                    <th>Suministro</th>
                    <th>Cantidad</th>
                    <th>Cantidad Total</th>
                    <th>Empleado</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <th >{{ $ordenCompra->fecha_emision->format('d-m-Y') }}</th>
                        <td >{{ $ordenCompra->suministro->nombre_suministro }}</td>
                        <td >{{ $ordenCompra->cantidad_pedida }}</td>
                        <td >{{ number_format($ordenCompra->cantidad_total, 2) }}</td>
                        <td >{{ $ordenCompra->empleado->nombre_empleado }} {{ $ordenCompra->empleado->apellido_empleado }}</td>
                    </tr>
               
            </tbody>
        </table>

        <!-- Footer -->
        <div class="footer">
            <p> &copy; 2024 JM. Todos los derechos reservados. </p>
        </div>
    </div>

</body>
</html>
