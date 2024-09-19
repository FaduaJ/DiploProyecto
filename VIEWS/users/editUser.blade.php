@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR USUARIO</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                @if(!empty($user->image))
                <img src="{{ URL::asset('/images/'.$user->image)}}" style="width: 120%" class="avatar img-circle img-thumbnail"
                    alt="avatar">
                @else
                <img src="{{ URL::asset('icons/sinimagen.png')}}" style="width: 120%" class="avatar img-circle img-thumbnail" alt="avatar">
                <h4>Sin foto de Perfil</h4>
                @endif
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Información Personal del Usuario</h3>
            <form enctype="multipart/form-data" class="form-horizontal"
                action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombres:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="name" id="name" type="text"
                            value="{{ $user->name }}" required>
                        @error('user_name')
                        <small class="text-danger">¡Introduzca su Nombre!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Apellidos:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="lastname" id="lastname" type="text"
                        value="{{ $user->lastname }}" required>
                        @error('lastname')
                        <small class="text-danger">¡Introduzca su Apellido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Usuario:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="username" id="username" type="text"
                        value="{{ $user->username }}" required>
                        @error('username')
                        <small class="text-danger">¡Introduzca el nombre de usuario!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="email" id="email" type="Email"
                        value="{{ $user->email }}" required>
                        @error('email')
                        <small class="text-danger">¡Introduzca el correo electronico!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Modificar solo los datos necesarios.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Guardar Cambios" class="btn btn-success">
                <a href="{{ route('users.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection