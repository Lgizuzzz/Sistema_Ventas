@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Reportes de Productos con Stock Minimo</h1>
      
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Administrar Reportes de Productos con bajo Stock</h5>
              <hr>
              <table class="table table-bordered datatable">
                <thead>
                  <tr>
                    <th class="text-center">Categoria</th>
                    <th class="text-center">Proveedor</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Imagen</th>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Venta</th>
                    <th class="text-center">Compra</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                  <tr class="text-center">
                    <td>{{$item->nombre_categoria}}</td>
                    <td>{{$item->nombre_proveedor}}</td>
                    <td>{{$item->nombre}}</td>
                    <td><img src="{{asset('storage/'. $item->imagen_producto)}}" alt="" width="60px" height="60px"></td>
                    <td>{{$item->descripcion}}</td>
                    <td class="text-center">{{$item->cantidad}}</td>
                    <td class="text-center">S/.{{$item->precio_compra}}</td>
                    <td class="text-center">S/.{{$item->precio_venta}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </section>
    
</main>
@endsection