@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">MODULO DE ESTUDIANTES</h1>
    </div>
    <div class="container">
        <div class="row style_featured">
            @can('students.create')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('students.create')}}">
                        <img src="{{URL::asset('icons/addstudent.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Registrar Estudiante</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Usted podra registrar toda la informacion necesaria de un estudiante, dicha informacion sera
                            utilizada en otros procesos.
                        </p>
                        <a href="{{ route ('students.create')}}" class="btn btn-success" title="Ir">Registrar</a>
                    </a>
                </div>
            </div>
            @endcan
            @can('students.index')
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('students.index')}}">
                        <img src="{{URL::asset('icons/viewstudent.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">Mostrar Estudiantes</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se visualiza toda la informacion de los estudiantes registrados ademas es posible editar,
                            eliminar o exportar toda la informacion.
                        </p>
                        <a href="{{ route ('students.index')}}" class="btn btn-success" title="Ir">Mostrar</a>
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