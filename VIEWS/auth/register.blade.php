@extends('layouts.layoutlogin')
@section('content')
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img style="width:100%;height:auto" src="images/LogoLogin.png" alt="Image">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Por Favor <strong>Registrese</strong></h3>
              <p class="mb-4">Ingrese sus datos en los campos vacios.</p>
            </div>
            <form action="{{ route('register.store') }}" method="POST">
              @csrf
              <div class="form-group first">
                <label for="name">Nombres</label>
                <input type="text" class="form-control" id="name" name="name" required>
              </div>
              @error('name')
              <div style="text-align:center">
                <span style="color: red">¡Nombres Vacio, Intente de Nuevo!</span>
              </div>
              @enderror

              <div class="form-group first">
                <label for="lastname">Apellidos</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required>
              </div>
              @error('lastname')
              <div style="text-align:center">
                <span style="color: red">¡Apellidos Vacio, Intente de Nuevo!</span>
              </div>
              @enderror

              <div class="form-group first">
                <label for="username">Nombre de Usuario</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              @error('username')
              <div style="text-align:center">
                <span style="color: red">¡Username Vacio, Intente de Nuevo!</span>
              </div>
              @enderror

              <div class="form-group last mb-4">
                <label for="Email">Email</label>
                <input type="Email" class="form-control" id="email" name="email" required>
              </div>
              @error('email')
              <div style="text-align:center">
                <span style="color: red">¡Email Vacio, Intente de Nuevo!</span>
              </div>
              @enderror
              <div class="form-group last mb-4">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              @error('password')
              <div style="text-align:center">
                <span style="color: red">¡Contraseñas No Coinciden, Intente de Nuevo!</span>
              </div>
              @enderror
              <div class="form-group last mb-4">
                <label for="checkpassword">Verificar Contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
              </div>
                <select class="form-select" aria-label="Default select example" name="rol" id="rol">
                  <option value="" disabled selected hidden>Seleccionar Rol</option>
                    @foreach($roles as $rol)
                      <option value="{{ $rol->name }}" >{{ $rol->name }}</option>
                    @endforeach
                </select>
                <br>
                <br>
              <input type="submit" value="Registrar" class="btn text-white btn-block btn-primary">
            </form>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
@endsection