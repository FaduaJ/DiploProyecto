@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">Lista de Permisos del Rol {{ $role->name }}</h1>
  </div>
  <div style="text-align: center">
    @can('userpermission.create')
    <a href="{{ route('userpermission.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    @endcan
    <a href="#" class="btn btn-primary btn-mini" disabled>PDF</a>
    <a href="#" class="btn btn-success btn-mini" disabled>EXCEL</a>
    <a href="{{ route('userpermission.index') }}" class="btn btn-info btn-mini">ATRÁS</a>
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
      @foreach ($assignments as $assignment)
      <tr>
        <td>{{ $assignment->name }}</td>
        <td>{{ $assignment->guard_name }}</td>
        <td>{{ date('d-m-Y', strtotime($assignment->created_at)); }}, {{ date(('H:i:s'), strtotime($assignment->created_at)); }}</td>
        <td style="text-align: center">
          @can('userpermission.destroy')
          <form action="{{ route('userpermission.destroy', [$assignment->name, $role->id]) }}" method="post">
            @csrf
            @method('delete')
            <input type="submit" onclick="return confirm('¿Desea eliminar el registro?')" class="btn btn-danger btn-sm" value="Eliminar">
          </form>
          @endcan
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $assignments->onEachSide(9)->links() }}
  <br>
  <div style="text-align: center">
    <span style="color: red">
      Nota: Es posible eliminar el permiso concedido al rol, no existe efecto cascada.
    </span>
  </div>
</div>
@endsection