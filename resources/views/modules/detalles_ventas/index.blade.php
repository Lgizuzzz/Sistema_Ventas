@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Consulta de Ventas Hechas</h1>
      
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Revisar Ventas Existentes</h5>

              <table class="table table-bordered datatable">
                <thead>
                  <tr>
                    <th class="text-center">Total Vendido</th>
                    <th class="text-center">Fecha Venta</th>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Ver Detalle</th>
                    <th class="text-center">Imprimir Ticket</th>
                    <th class="text-center">Revocar Venta</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                  <tr class="text-center">
                    <td>S/. {{$item->total_venta}}</td>
                    <td class="text-center">{{$item->created_at}}</td>
                    <td>{{$item->nombre_usuario}}</td>
                    <td>
                      <a href="{{route('detalles.vista.detalle', $item->id)}}" class="btn btn-info">Detalle</a>
                    </td>
                    <td>
                      <a target="_blank" href="{{route('detalles.ticket', $item->id)}}" class="btn btn-success">Imprimir</a>
                    </td>
                    <td>
                      <form action="{{route('detalle.revocar', $item->id)}}" method="POST" onsubmit="return confirm('¿¿Estas Seguro de Revocar la Venta??')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Revocar</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    
</main>
@endsection
