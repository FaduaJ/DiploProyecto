@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR PERFIL DE USUARIO</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                @if(!empty($usuario->image))
                <img src="{{ asset('/images/'.$usuario->image)}}" style="width: 120%" class="avatar img-circle img-thumbnail" alt="avatar">      
                @else
                <img src="{{ URL::asset('icons/sinimagen.png')}}" style="width: 120%" class="avatar img-circle img-thumbnail" alt="avatar">
                <h4>Sin foto de Perfil</h4>
                @endif
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Información Personal</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('user.update') }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombres:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="name" id="name" type="text" value="{{ $usuario->name }}">
                        @error('name')
                        <small class="text-danger">¡Introduzca su Nombre!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Apellidos:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="lastname" id="lastname" type="text"
                            value="{{ $usuario->lastname }}">
                            @error('lastname')
                        <small class="text-danger">¡Introduzca su Apellido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Usuario:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="username" id="username" type="text"
                            value="{{ $usuario->username }}" readonly>
                            @error('username')
                        <small class="text-danger">¡Introduzca su nombre de Usuario!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="email" id="email" type="email" value="{{ $usuario->email }}">
                        @error('email')
                        <small class="text-danger">¡Introduzca su Email!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Rol:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="rol" id="rol" type="text" value="{{ $usuario->rol }}"
                            readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Imagen:</label>
                    <input type="file" name="img" id="img" accept="image/png, image/jpeg">
                    @error('img')
                        <small class="text-danger">Formato Incorrecto!, Intente de Nuevo</small>
                    @enderror
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: Su foto de perfil no debe pesar mas de 5 MegaBytes, formatos (jpeg, jpg).
                    </span>
                </div>
                <hr>
                <input type="submit" value="Actualizar Perfil" class="btn btn-success">
                <a href="{{ route('portal.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection