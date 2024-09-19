@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">EDITAR ROL DE ACCESSO</h1>
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
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('role.update', $role->id) }}"
                method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre del Rol:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="name" id="name" type="text" value="{{ $role->name }}">
                        @error('name')
                        <small class="text-danger">¡Nombre Vacio o Repetido!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tipo de Guardian:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="guard_name" name="guard_name" style="width: 100%;">
                            <option value="{{ $role->guard_name }}">{{ $role->guard_name }}</option>
                          </select>
                          @error('guard_name')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Fecha Creacion:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="role_date" id="role_date" type="text" value="{{ date('d-m-Y', strtotime($role->created_at)); }}" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Hora Creacion:</label>
                    <div class="col-lg-8">
                        <input class="form-control" name="role_date" id="role_date" type="text" value="{{ date(('H:i:s'), strtotime($role->created_at)); }}" readonly>
                    </div>
                </div>
                <div class="form-group" style="text-align: center" >
                    <span style="color: red">
                        Nota: Solo es posible editar el nombre del rol de acesso.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Editar Rol" class="btn btn-success">
                <a href="{{ route('role.index') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection