@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE USUARIOS Y ROLES</h1>
  </div>
  <div style="text-align: center">
    <a href="{{ route('userrole.pdf') }}" class="btn btn-primary btn-mini">PDF</a>
    <a href="#" class="btn btn-success btn-mini" disabled>EXCEL</a>
    <a href="{{ route('role.main') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4" style="text-align: center">
    <thead class="bg-success text-white">
      <tr>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>Nombre de Usuario</th>
        <th>email</th>
        <th>Rol</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->lastname }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->rol }}</td>
        <td style="text-align: center">
          @can('userrole.edit')
          <a class="btn btn-success btn-sm" href="{{ route('userrole.edit', $user->id) }}">Editar</a>
          @endcan
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $users->onEachSide(9)->links() }}
  <br>
  <div style="text-align: center">
    <span style="color: red">
      Nota: Por motivos de seguridad no es posible eliminar los roles de accesso, solo modificarlos.
    </span>
  </div>
</div>
@endsection