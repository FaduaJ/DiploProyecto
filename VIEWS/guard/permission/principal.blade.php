@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">SUB MODULO DE PERMISOS</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('permission.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('permission.create')}}">
                        <img src="{{URL::asset('icons/addroutes.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Ruta de Accesso</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se obtiene y registran los nombres de rutas a los cuales se podran acceder luego de asignar el permiso.
                        </p>
                        <a href="{{ route ('permission.create')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('permission.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('permission.index')}}">
                        <img src="{{URL::asset('icons/viewroutes.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Rutas de Accesso</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Visualiza las rutas del sistema de accessos, no es posible editar ni eliminar debido al efecto cascada.
                        </p>
                        <a href="{{ route ('permission.index')}}" class="btn btn-success" title="Ir">Mostrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('userpermission.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('userpermission.create')}}">
                        <img src="{{URL::asset('icons/assignpermission.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Asignar Permisos de Accesso al Rol</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Asignar, conceder uno o mas permisos a cada usuario en base a su respectivo rol registrado en sistema.
                        </p>
                        <a href="{{ route ('userpermission.create')}}" class="btn btn-success" title="Ir">Ingresar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('userpermission.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('userpermission.index')}}">
                        <img src="{{URL::asset('icons/viewpermission.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Ver Permisos por Roles</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Visualiza todos los permisos anclados a roles registrados en el sistema, es posible eliminar registros.
                        </p>
                        <a href="{{ route ('userpermission.index')}}" class="btn btn-success" title="Ir">Mostrar</a>
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