@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR ROL DE ACCESSO DE USUARIO</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="{{ asset('/images/industrial.png') }}"  alt="LOGO">
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Información del Rol</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('userrole.update', $user->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Apellidos:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="user_lastname" id="user_lastname" type="text" value="{{ $user->lastname }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombres:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="user_name" id="user_name" type="text" value="{{ $user->name }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Usuario:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="username" id="username" type="text" value="{{ $user->username }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="user_email" id="user_email" type="text" value="{{ $user->email }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Roles Disponibles:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="user_rol" name="user_rol" style="width: 100%;">
                            <option value="{{ $user->rol }}">{{ $user->rol }}</option>
                            @foreach($roles as $rol)
                            <option value="{{ $rol->id }}" >{{ $rol->name }}</option>
                            @endforeach
                          </select>
                          @error('user_rol')
                        <small class="text-danger">¡Seleccione un Rol!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center" >
                    <span style="color: red">
                        Nota: Solo es posible editar el rol de acesso.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar User Rol" class="btn btn-success">
                <a href="{{ route('userrole.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection