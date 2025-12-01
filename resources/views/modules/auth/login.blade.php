@extends('layouts.login')

@section('titulo',$titulo)

@section('contenido')
<main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">

                </a>
              </div><!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                  <img src="{{asset('img/logo2.png')}}" alt="" class="img-fluid">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Iniciar Sesion</h5>
                    <p class="text-center small">Ingresa tu email y contraseña para acceder</p>
                  </div>
                  <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('logear')}}">
                    @csrf
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control" id="email" required>
                        <div class="invalid-feedback">Ingresa tu correo</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="password" class="form-label">Contraseña</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Ingresa tu Contraseña!</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>
                  <!-- Validacion -->
                  <div>
                    @if ($errors->any())
                    <p>
                      <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </p>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
@endsection