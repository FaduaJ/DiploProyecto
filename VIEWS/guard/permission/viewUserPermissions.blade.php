@extends('layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
        <h1 style="text-align:center; color: red; font-weight: bolder;">SUB MODULO DE ROLES Y PERMISOS</h1>
    </div>
        <div class="search" style="text-align:center" style="display: inline-block">
            <a href="{{ route('permission.main') }}">
                <button class="btn btn-danger btn-gm">Volver Atrás</button>
            </a>
        </div>
    <div class="container">
        <div class="row style_featured">
          @foreach ($roles as $role)
            <div class="col-md-4">
                <div>
                    <a href="{{ route ('userpermissionlist.index', $role->id)}}">
                        <img src="{{URL::asset('icons/userpermission.png')}}" alt="imagen"
                            class="img-rounded img-thumbnail" />
                        <h2 style="color: maroon;">{{ $role->name }}</h2>
                        <p style="text-align: left;">
                            <span class="fa fa-info-circle"></span>
                            Se visualiza la lista completa de permisos concedidos de cada Rol.
                        </p>
                        <a href="{{ route ('userpermissionlist.index', $role->id)}}" class="btn btn-success" title="Ir">Ver Lista</a>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $roles->onEachSide(9)->links() }}
    </div>
</div>
@endsection