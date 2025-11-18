@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Hacer una Compra</h1>
      
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Compra Nueva</h5>
                <form action="{{ route('compras.store')}}" method="POST">
                    @csrf
                    <label for="cantidad">Cantidad del producto</label>
                    <input type="text" class="form-control" required name="cantidad" id="cantidad">
                    <label for="precio_compra">Precio de Compra</label>
                    <input type="text" id="precio_compra" name="precio_compra" class="form-control" required>
                    <button class="btn btn-primary mt-3">Comprar</button>
                    <a href="{{ route('productos') }}" class="btn btn-info mt-3">Cancelar</a>
                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>