<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Compra</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .ticket{
            width: 300px;
            margin: auto;
            padding: 10px;
            border: 1px solid #000;
        }
        .titulo{
            font-size: 18px;
            font-weight: bold;
        }
        .detalle{
            text-align: left;
            margin-top: 10px;
        }
        .total{
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }
        table{
            width: 100%;
            border-collapse: collapse;
        }

        th, td{
            border-bottom: 1px solid #000;
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="ticket">
            <p class="titulo">Ticket de Compra en Tecnimotos Lopez</p>
            <p><strong>Cajero: </strong>{{$venta->nombre_usuario}}</p>
            <p><strong>Fecha: </strong>{{$venta->created_at}}</p>

            <div class="detalle">
                <table border="1">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cant.</th>
                            <th>Precio</th>
                            <th>SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $item)
                        <tr class="text-center">
                            <td>{{$item->nombre_producto}}</td>
                            <td>{{$item->cantidad}}</td>
                            <td>S/. {{$item->precio_unitario}}</td>
                            <td>S/. {{$item->sub_total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="total"><strong>Total de Venta: </strong>S/. {{$venta->total_venta}}</p>
            <p>Gracias por Comprar!!</p>
    </div>
</body>
</html>