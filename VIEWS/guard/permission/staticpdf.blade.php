<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf system_permissions</title>
</head>
<style>
    table,th,td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
    }

    h2 {
        text-align: center;
        color: red;
    }
    p, label{
        text-align: center;
        color: green;
    }
</style>
<body>
    <h2>PERMISOS DISPONIBLES EN EL SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Nombre</th>
            <th>Tipo de Guardian</th>
            <th>Fecha de Creacion</th>
            <th>Hora de Creacion</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($permissions as $permission)
          <tr>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->guard_name }}</td>
            <td>{{ date('d-m-Y', strtotime($permission->created_at)); }}</td>
            <td>{{ date(('H:i:s'), strtotime($permission->created_at)); }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros:{{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>