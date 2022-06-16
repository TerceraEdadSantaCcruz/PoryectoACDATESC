<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Exportar a PDF</title>
    <style>
        #benF {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100;
        }

        #benF td,
        #benF th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #benF th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: #fff;
        }

    </style>
</head>

<body>
    <h2>Reporte de Pagos</h2>
    <table id="benF">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>1er Apellido</th>
                <th>2do Apellido</th>
                <th>Tipo de cuota</th>
                <th>Monto</th>
                <th>Fecha de pago</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beneficiarios as $beneficiario)
                <tr>
                    <td>{{ $beneficiario->Identificacion_Beneficiario }}</td>
                    <td>{{ $beneficiario->Nombre }}</td>
                    <td>{{ $beneficiario->Apellido_1 }}</td>
                    <td>{{ $beneficiario->Apellido_2 }}</td>
                    <td>{{ $beneficiario->Tipo_Cuota }}</td>
                    <td>¢ {{ $beneficiario->Monto }}</td>
                    <td>{{ $beneficiario->Fecha_Pago }}</td>
                    <td>{{ $beneficiario->Descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
