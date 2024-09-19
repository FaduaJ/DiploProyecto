@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR CONTRASEÑA DE USUARIO</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                @if(!empty($usuario->image))
                <img src="{{ asset('/images/'.$usuario->image)}}" class="avatar img-circle img-thumbnail" alt="avatar">
                @else
                <img src="{{ URL::asset('icons/sinimagen.png')}}" style="width: 120%" class="avatar img-circle img-thumbnail" alt="avatar">
                <h4>Sin foto de Perfil</h4>
                @endif
            </div>
        </div>
        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <h3 style="text-align: center">Editar Contraseña de {{ $usuario->name }} {{ $usuario->lastname }}</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('pass.update') }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Usuario:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="username" id="username" type="text" value="{{ $usuario->username }}" readonly>
                            @error('username')
                        <small class="text-danger">¡Introduzca su nombre de Usuario!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nueva Contraseña:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="password" id="password" type="password" required>
                        @error('password')
                        <small class="text-danger">¡Las Contraseñas no coinciden!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Verificar Contraseña:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" required>
                        @error('password')
                        <small class="text-danger">¡Las Contraseñas no coinciden!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: La contraseña se puede modificar como maximo 3 veces pasado ese limite debera contactar con el <a target="_blank" href="https://wa.me/+59171308634?text=Me%20gustaria%20cambiar%20mi%20password%20del%20portal%20de%20Ing%20Industrial"> Administrador</a>.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Actualizar Contraseña" class="btn btn-success">
                <a href="{{ route('portal.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection