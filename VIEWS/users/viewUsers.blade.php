@extends('layouts.master')
@section('content')
<div class="container">
  <div class="page-header">
    <h1 style="text-align:center; color: red; font-weight: bolder;">LISTA DE USUARIOS DEL SISTEMA</h1>
  </div>
  <div class="search" style="text-align:center;">
    <form action="{{ route('users.search') }}" method="GET">
      <input type="text" class="searchTerm" name="search" id="search" value="{{ request()->input('search') }}"
        placeholder="Buscar Usuario.." required>
      @error('search')
      <small class="text-danger">¡Campo Vacio!</small>
      @enderror
      <button type="submit" class="searchButton"> <i class="fa fa-search"></i> </button>
    </form>
  </div>
  <br>
  <div style="text-align: center">
    {{-- @can('users.create') --}}
    <a href="{{ route('users.create') }}" class="btn btn-warning btn-mini">CREAR</a>
    {{-- @endcan --}}
    <a href="#" class="btn btn-primary btn-mini">PDF</a>
    <a href="#" class="btn btn-success btn-mini">EXCEL</a>
    <a href="{{ route('role.main') }}" class="btn btn-info btn-mini">ATRÁS</a>
  </div>
  <table id="table_id" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-success text-white">
      <tr>
        <th>Apellidos</th>
        <th>Nombres</th>
        <th>Username</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Ultimo Cambio</th>
        <th>Password</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <div class="modal fade" id="exampleModal{{ $user->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLabel" style="color: red;">Modificar Password
              </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="col-md-12" style="text-align: center">
              <form class="form-horizontal" action="{{ route('users.password', $user) }}"
                method="POST">
                @csrf
                @method('put')
                <br>
                <div class="form-group">
                  <label class="control-label">Nuevo Password</label>
                  <div>
                      <input type="password" class="form-control input-lg" name="password" placeholder="Ingrese la nueva contraseña">
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label">Repetir Password</label>
                  <div>
                      <input type="password" class="form-control input-lg" name="password_confirmation" placeholder="Repita la nueva contraseña">
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-success">Modificar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <tr>
        <td>{{ $user->lastname }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->rol }}</td>
        <td>{{ $user->updated_at->format('d-m-Y') }}</td>
        <td style="text-align: center">
          <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal"
            data-target="#exampleModal{{ $user->id }}" title="Carga Masiva via Excel">
            Cambiar
          </button>
        </td>
        <td style="text-align: center">
          {{-- @can('students.destroy') --}}
          <form action="{{ route('users.destroy', $user) }}" method="post" style="display: inline-block">
            @csrf
            @method('delete')
            <input type="submit" onclick="return confirm('¿Desea eliminar el registro?')" class="btn btn-danger btn-sm"
              value="Eliminar">
          </form>
          {{-- @endcan --}}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $users->onEachSide(9)->withQueryString()->links() }}
  <br>
  <div style="text-align: center">
    <span style="color: red">
      Nota: Eliminar un usuario solo implica quitar el acceso al sistema, no genera dependencia.
    </span>
  </div>
</div>
@endsection