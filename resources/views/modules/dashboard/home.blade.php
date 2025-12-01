@extends('layouts.main')

@section('titulo', $titulo)

@section('contenido')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bienvenido, {{Auth::user()->name}}!!</h5>
              
              <div class="row">
                <div class="col">
                  <h4>Total de Ventas: S/. {{number_format($totalVentas, 2)}}</h4>
                  <canvas id="chartTotalVentas" height="250"></canvas>
                </div>
                <div class="col">
                  <h4>Cantidad de Ventas: {{$cantidadVentas}}</h4>
                  <canvas id="chartCantidadVentas" height="250"></canvas>
                </div>
                <div class="col">
                  <h4>Productos con Bajo Stock: {{count($productosBajosStock)}}</h4>
                  <canvas id="chartProductosBajos" height="250"></canvas>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col">
                  <h4>Ultimas Ventas:</h4>
                  <ul>
                    @foreach($ventasRecientes as $item)
                      <li>Venta #{{$item->id}} - S/. {{number_format($item->total_venta, 2)}}</li>
                    @endforeach  
                  </ul>
                  <div style="height:350px;">
                    <canvas id="chartUltimasVentas" height="120"></canvas>
                  </div>
                </div>
              </div>

          </div>
        </div>
      </div>
    </section>
    
</main>
@endsection

@push('scripts')
<script>
  // ====== DATA DESDE LARAVEL ======
  const labelsMeses         = @json($labelsMeses);
  const dataTotalMes        = @json($dataTotalMes);
  const dataCantidadMes     = @json($dataCantidadMes);

  const labelsProductosBajos = @json($labelsProductosBajos);
  const dataProductosBajos   = @json($dataProductosBajos);

  const labelsUltimasVentas = @json($labelsUltimasVentas);
  const dataUltimasVentas   = @json($dataUltimasVentas);

  // ====== GRAFICO 1: TOTAL DE VENTAS POR MES (BARRAS) ======
  const ctxTotal = document.getElementById('chartTotalVentas').getContext('2d');
  new Chart(ctxTotal, {
    type: 'bar',
    data: {
      labels: labelsMeses,
      datasets: [{
        label: 'Total de ventas (S/.)',
        data: dataTotalMes,
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true }
      }
    }
  });

  // ====== GRAFICO 2: CANTIDAD DE VENTAS POR MES (LÍNEA) ======
  const ctxCant = document.getElementById('chartCantidadVentas').getContext('2d');
  new Chart(ctxCant, {
    type: 'line',
    data: {
      labels: labelsMeses,
      datasets: [{
        label: 'Cantidad de ventas',
        data: dataCantidadMes,
        borderWidth: 2,
        fill: false,
        tension: 0.3
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true }
      }
    }
  });

  // ====== GRAFICO 3: PRODUCTOS CON BAJO STOCK (BARRAS HORIZONTALES) ======
  const ctxProd = document.getElementById('chartProductosBajos').getContext('2d');
  new Chart(ctxProd, {
    type: 'bar',
    data: {
      labels: labelsProductosBajos,
      datasets: [{
        label: 'Cantidad en stock',
        data: dataProductosBajos,
        borderWidth: 1
      }]
    },
    options: {
      indexAxis: 'y', // barras horizontales
      responsive: true,
      scales: {
        x: { beginAtZero: true }
      }
    }
  });

  // ====== GRAFICO 4: ULTIMAS VENTAS (DOUGHNUT) ======
  const ctxUlt = document.getElementById('chartUltimasVentas').getContext('2d');
  new Chart(ctxUlt, {
    type: 'doughnut',
    data: {
      labels: labelsUltimasVentas,
      datasets: [{
        label: 'Monto (S/.)',
        data: dataUltimasVentas,
        borderWidth: 1
      }]
    },
    options: {
      responsive: true
    }
  });
</script>
@endpush




