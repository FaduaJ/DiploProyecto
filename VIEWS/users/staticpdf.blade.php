<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf student</title>
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
    <h2>ESTUDIANTES REGISTRADOS EN EL SISTEMA</h2>
    <table style="width: 100%">
        <thead >
          <tr>
            <th>Apellidos</th>
            <th>Nombres</th>
            <th>Registro</th>
            <th>Nro de CI</th>
            <th>Celular</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student)
          <tr>
            <td>{{ $student->student_lastname }}</td>
            <td>{{ $student->student_name }}</td>
            <td>{{ $student->student_register }}</td>
            <td>{{ $student->student_ci }} {{ $student->student_exp }} </td>
            <td>{{ $student->student_number }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <p>Cantidad de Registros : {{ $cantidad }}</p>
    <p>CARRERA DE INGENIERIA INDUSTRIAL - UAGRM</p>
    <p>{{ $fecha }}</p>
</body>
</html>