@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Detalle de la Venta</h1>
      
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Detalle de la venta</h5>
              <p><strong>Usuario que hizo la venta: </strong>{{$venta->nombre_usuario}}</p>
              <p><strong>Total de Venta: </strong>S/. {{$venta->total_venta}}</p>
              <p><strong>Fecha: </strong>{{$venta->created_at}}</p>
              <hr>
              <table class="table table-bordered datatable">
                <thead>
                  <tr>
                    <th class="text-center">Producto</th>
                    <th class="text-center">Cantidad</th>
                    <th class="text-center">Precio Unitario</th>
                    <th class="text-center">SubTotal</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($detalles as $item)
                  <tr class="text-center">
                    <td>{{$item->nombre_producto}}</td>
                    <td>{{$item->cantidad}}</td>
                    <td>S/. {{$item->precio_unitario}}</td>
                    <td>S/. {{$item->sub_total}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <hr>
              <a href="{{route('detalles-venta')}}" class="btn btn-info">Cancelar</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
</main>
@endsection
