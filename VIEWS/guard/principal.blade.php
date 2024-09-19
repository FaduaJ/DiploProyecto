@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE SEGURIDAD Y ACCESSO</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('role.main')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('role.main')}}">
                        <img src="{{URL::asset('icons/roles.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Roles de Accesso</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Gestiona todos los roles posibles que puedan existir dentro de la carrera de Ing Industrial de forma dinamica.
                        </p>
                        <a href="{{ route ('role.main')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('permission.main')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('permission.main')}}">
                        <img src="{{URL::asset('icons/permission.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Permisos de Sistema</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Gestiona los permisos que son concedidos a cada usuario que tenga un rol especifico de accesso.
                        </p>
                        <a href="{{ route ('permission.main')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('portal.index')}}">
                        <img src="{{URL::asset('icons/back.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Volver Atrás</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Presiona en el botón para regresar a la página anterior o puedes utilizar el menu ubicado en
                            la parte de arriba.
                        </p>
                        <a href="{{ route ('portal.index')}}" class="btn btn-success" title="Ir">Volver</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection