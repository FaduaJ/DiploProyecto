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
              <h3>Solicitar Nueva <strong>Contraseña</strong></h3>
              <p class="mb-4">Por Favor Ingrese su correo electronico asociado a su cuenta.</p>
            </div>
            <form action="{{ route('password.forgot') }}" method="POST">
              @csrf
              <div class="form-group first">
                <label for="email">Correo Electronico</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
              <div class="d-flex mb-5 align-items-center">
                <span class="ml-auto"><a target="_blank"
                    href="https://wa.me/+59171308634?text=Me%20gustaria%20cambiar%20mi%20correo%20electronico%20para%20reestablecer%20mi%20contraseña%20del%20portal%20de%20Ing.%20Industrial"
                    class="forgot-pass">Olvidaste tu Correo?</a></span>
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
              <input type="submit" value="Iniciar" class="btn text-white btn-block btn-primary">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection