@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE ROLES DEL SISTEMA</h1>
  </div>
  <div style="text-align: center">
    @can('role.create')
    <a href="{{ route('role.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="{{ route('role.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="{{ route('categories.excel') }}" class="btn btn-success btn-mini" disabled>EXCEL</a>
    <a href="{{ route('role.main') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4" style="text-align: center">
    <thead class="bg-success text-white">
      <tr>
        <th>Nombre del Rol</th>
        <th>Tipo de Guardian</th>
        <th>Fecha, Hora de Creacion</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($roles as $role)
      <tr>
        <td>{{ $role->name }}</td>
        <td>{{ $role->guard_name }}</td>
        <td>{{ date('d-m-Y', strtotime($role->created_at)); }}, {{ date(('H:i:s'), strtotime($role->created_at)); }}</td>
        <td style="text-align: center">
          @can('role.edit')
          <a class="btn btn-success btn-sm" href="{{ route('role.edit', $role->id) }}">Editar</a>
          @endcan
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $roles->onEachSide(9)->links() }}
  <br>
  <div style="text-align: center">
    <span style="color: red">
      Nota: Por motivos de seguridad no es posible eliminar los roles de accesso, solo modificarlos.
    </span>
  </div>
</div>
@endsection