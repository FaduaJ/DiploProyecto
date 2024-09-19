@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR USUARIO DE SISTEMA</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="{{ asset('/images/industrial.png') }}" alt="LOGO">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3>Información Personal del Usuario</h3>
            <form class="form-horizontal" action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombres:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="name" id="name" type="text"
                            placeholder="ejemplo Nells Antonio">
                        @error('user_name')
                        <small class="text-danger">¡Introduzca su Nombre!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Apellidos:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="lastname" id="lastname" type="text"
                            placeholder="ejemplo Vidal Vargas">
                        @error('lastname')
                        <small class="text-danger">¡Introduzca su Apellido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Usuario:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="username" id="username" type="text"
                            placeholder="ejemplo 216166922">
                        @error('username')
                        <small class="text-danger">¡Introduzca el nombre de usuario!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="email" id="email" type="Email"
                            placeholder="ejemplo user.vidal@gmail.com">
                        @error('email')
                        <small class="text-danger">¡Introduzca el correo electronico!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Password:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="password" id="password" type="password"
                            placeholder="Ingrese un password" required>
                        @error('password')
                        <small class="text-danger">¡Contraseñas No Coinciden, Intente de Nuevo!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Verificar Password:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="password_confirmation" id="password_confirmation"
                            type="password" placeholder="Repita el password" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Seleccionar Rol:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="rol" name="rol" style="width: 100%;" required>
                            <option value="" disabled selected hidden>Seleccionar Rol</option>
                            @foreach($roles as $rol)
                            <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                            @endforeach
                        </select>
                        @error('rol')
                        <small class="text-danger">¡Es necesario seleccionar un Rol!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: No es posible registrar duplicidad de Email y Username.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Registrar Usuario" class="btn btn-success">
                <a href="{{ route('role.main') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection