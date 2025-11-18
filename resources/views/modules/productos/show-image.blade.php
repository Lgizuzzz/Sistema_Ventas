@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Editar Imagen del Producto</h1>
      
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Editar Imagen del Producto del Stock</h5>

              <hr>
              <form action="{{route('productos.update.image', $item->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="imagen">Selecciona la Nueva Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
                <hr>
                <button class="btn btn-warning">Actualizar Imagen</button>
                <a href="{{route('productos')}}" class="btn btn-info">Cancelar</a>
              </form>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>
    
</main>
@endsection
