<html>
    <head>
        <meta charset="utf-8">
        <title>Reporte</title>
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body { font-family: Arial, sans-serif; padding: 20px; }
            .container { width: 100%; }
            table { width: 100%; border-collapse: collapse; margin-top: 20px; }
            th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }
            th { background-color: #f5f5f5; font-weight: bold; }
            tr:nth-child(even) { background-color: #f9f9f9; }
            .header { text-align: center; margin-bottom: 30px; }
            .header h1 { font-size: 16px; margin: 5px 0; }
            .header p { font-size: 12px; margin: 2px 0; }
        </style>
    </head>
<body>
    <div class="container">
        <!-- Encabezado del reporte-->
        @include('pdfs.partial.header', 
                        ['text_1' => 'REPORTE MENSUAL DE INVENTARIO ALMACEN',
                        'text_2' => 'DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS GENERALES',
                        ])
        <div class="header">
            <p>Período: {{ $fechaInicio }} a {{ $fechaFin }}</p>
        </div>
        
        <!--Tabla de productos-->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Clave</th>
                    <th>Producto</th>
                    <th>Existencia Inicial</th>
                    <th>Entradas</th>
                    <th>Salidas</th>
                    <th>Existencia Final</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reporteData as $item)
                    <tr>
                        <td>{{ $item['datos_producto']->id_producto }}</td>
                        <td>{{ $item['datos_producto']->clave->valor_clave }}</td>
                        <td style="word-wrap: break-word; max-width: 150px;">{{ $item['datos_producto']->nombre_producto }}</td>

                        <td>{{ $item['exInicial'] }}</td>
                        <td>{{ $item['totalEntrada'] }}</td>
                        <td>{{ $item['totalSalida'] }}</td>
                        <td>{{ $item['exFinal'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center;">No hay datos disponibles</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>