@extends('layouts.master')
@section('content')
<div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">REGISTRAR RUTA DE ACCESSO</h1>
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
            <h3>Información de la Ruta</h3>
            <form enctype="multipart/form-data" class="form-horizontal" action="{{ route('permission.store') }}"
                method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nombre de Ruta:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="routes" name="routes[]" multiple="multiple" style="width: 100%;" >
                            @foreach($routes as $key => $value)
                            <option value="{{ $value['route_name'] }}" >{{ $value['route_name'] }}</option>
                            @endforeach
                          </select>
                          @error('routes')
                        <small class="text-danger">¡Seleccione una o mas Rutas!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Tipo de Guardian:</label>
                    <div class="col-lg-8">
                        <select class="js-example-basic-single" id="guard_name" name="guard_name" style="width: 100%;">
                            <option value="" disabled selected hidden>Seleccionar Tipo</option>
                            <option value="web">Web</option>
                            <option value="movil" disabled>Movil</option>
                          </select>
                          @error('guard_name')
                        <small class="text-danger">¡Campo Vacio!</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group" style="text-align: center">
                    <span style="color: red">
                        Nota: No es posible registrar nombres de roles duplicados, sera rechazado.
                    </span>
                </div>
                <hr>
                <input type="submit" value="Agregar Ruta " class="btn btn-success">
                <a href="{{ route('permission.main') }}">
                    <input value="Cancelar" class="btn btn-danger">
                </a>
            </form>
        </div>
    </div>
</div>
@endsection