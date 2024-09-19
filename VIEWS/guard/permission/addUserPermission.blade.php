@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">ASIGNAR PERMISOS POR ROLES</h1>
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
            <h3>Información de Roles y Permisos</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('userpermission.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Seleccionar Permisos:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="permissions" name="permissions[]" multiple="multiple" style="width: 100%;" >
                            @foreach($permissions as $permission)
                            <option value="{{ $permission->name }}" >{{ $permission->name }}</option>
                            @endforeach
                          </select>
                          @error('permissions')
                        <small class="text-danger">¡Seleccione un o mas Permisos!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Roles:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="role_id" name="role_id" style="width: 100%;" >
                            <option value="" disabled selected hidden>Seleccionar Rol</option>
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}" >{{ $role->name }}</option>
                            @endforeach
                          </select>
                          @error('role_id')
                        <small class="text-danger">¡Seleccione un Rol!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: No es posible registrar el mismo permisos 2 veces al mismo rol, sera rechazado.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Asignar Permisos " class="btn btn-success">
                <a href="{{ route('permission.main') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection