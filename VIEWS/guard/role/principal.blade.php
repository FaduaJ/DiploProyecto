@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">SUB MODULO DE ROLES Y USUARIOS</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('role.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('role.create')}}">
                        <img src="{{URL::asset('icons/addroles.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Crear Rol de Sistema</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se puede registrar todos los roles que existen en la Carrera de Ing Industrial posterior seran asignados.
                        </p>
                        <a href="{{ route ('role.create')}}" class="btn btn-success" title="Ir">Crear</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('role.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('role.index')}}">
                        <img src="{{URL::asset('icons/viewroles.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Roles</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Visualiza todos los roles registrados en el sistema, no es posible editar ni eliminar debido a cascada.
                        </p>
                        <a href="{{ route ('role.index')}}" class="btn btn-success" title="Ir">Mostrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('userrole.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('userrole.index')}}">
                        <img src="{{URL::asset('icons/viewassignrole.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Usuarios y Roles</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Visualiza todos los roles anclados a usuarios registrados en el sistema, es posible editar registros.
                        </p>
                        <a href="{{ route ('userrole.index')}}" class="btn btn-success" title="Ir">Mostrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('users.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('users.index')}}">
                        <img src="{{URL::asset('icons/viewusers.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Usuarios del Sistema</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Visualiza todos los usuarios del sistema, es posible editar su informacion personal en casos de emergencia.
                        </p>
                        <a href="{{ route ('users.index')}}" class="btn btn-success" title="Ir">Mostrar</a>
                    </a>
                </div>
            </div>
            @endcan
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('guard.index')}}">
                        <img src="{{URL::asset('icons/back.png')}}" alt="imagen" class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Volver Atrás</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Presiona en el botón para regresar a la página anterior o puedes utilizar el menu ubicado en
                            la parte de arriba.
                        </p>
                        <a href="{{ route ('guard.index')}}" class="btn btn-success" title="Ir">Volver</a>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection