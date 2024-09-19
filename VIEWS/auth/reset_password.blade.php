@extends('layouts.layoutlogin')
@section('content')
<div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img style="width:100%;height:auto" src="{{ asset('images/LogoLogin.png') }}" alt="Image">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Registrar Nueva <strong>Contraseña</strong></h3>
              <p class="mb-4">Por Favor Ingrese el correo asociado y la nueva Contraseña.</p>
            </div>
            <form action="{{ route('password.update') }}" method="POST">
              @csrf
              <div class="form-group first" hidden>
                <label for="token">Token</label>
                <input type="text" class="form-control" id="token" name="token" value="{{ $token }}" required>
              </div>
              <div class="form-group first">
                <label for="email">Correo Electronico</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="form-group last mb-4">
                <label for="password">Nueva Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
              </div>
              @error('password')
              <div style="text-align:center">
                <span style="color: red">¡Contraseñas No Coinciden, Intente de Nuevo!</span>
              </div>
              @enderror
              <div class="form-group last mb-4">
                <label for="checkpassword">Repetir Contraseña</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
              </div>
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul class="list-unstyled">
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
              @endif
              @if (Session::has('status'))
              <div class="alert alert-success">
                <ul class="list-unstyled">
                  <li>{{ Session::get('status') }}</li>
                </ul>
              </div>
              @endif
              <input type="submit" value="Reestablecer" class="btn text-white btn-block btn-primary">
            </form>
            </div>
          </div>
        </div> 
      </div>
    </div>
  </div>
@endsection