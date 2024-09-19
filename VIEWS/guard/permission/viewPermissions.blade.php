@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE PERMISOS DEL SISTEMA</h1>
  </div>
  <div style="text-align: center">
    @can('permission.create')
    <a href="{{ route('permission.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('permission.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="#" class="btn btn-success btn-mini" disabled>EXCEL</a>
    <a href="{{ route('permission.main') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4" style="text-align: center">
    <thead class="bg-success text-white">
      <tr>
        <th>Nombre de Ruta</th>
        <th>Tipo de Guardian</th>
        <th>Fecha, Hora de Creacion</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($permissions as $permission)
      <tr>
        <td>{{ $permission->name }}</td>
        <td>{{ $permission->guard_name }}</td>
        <td>{{ date('d-m-Y', strtotime($permission->created_at)); }}, {{ date(('H:i:s'), strtotime($permission->created_at)); }}</td>
        <td style="text-align: center">
          No es Posible
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $permissions->onEachSide(9)->links() }}
  <br>
  <div style="text-align: center">
    <span style="color: red">
      Nota: Por motivos de seguridad no es posible editar y/o eliminar los permisos.
    </span>
  </div>
</div>
@endsection