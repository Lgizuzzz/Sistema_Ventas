<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $titulo = 'Dashboard';

        // ---------- TARJETAS ----------
        $totalVentas         = Venta::sum('total_venta');
        $cantidadVentas      = Venta::count();
        $productosBajosStock = Producto::where('cantidad', '<', 5)->get();
        $ventasRecientes     = Venta::orderBy('created_at', 'desc')
                                    ->take(5)
                                    ->get();

        // ---------- GRAFICO 1 y 2: VENTAS POR MES ----------
        $ventasPorMes = Venta::selectRaw("
                DATE_FORMAT(created_at, '%Y-%m') as mes,
                SUM(total_venta) as total,
                COUNT(*) as cantidad
            ")
            ->groupBy('mes')
            ->orderBy('mes', 'asc')
            ->take(6)
            ->get();

        $labelsMeses      = $ventasPorMes->pluck('mes');      // ej. ["2025-07", "2025-08", ...]
        $dataTotalMes     = $ventasPorMes->pluck('total');    // total S/ por mes
        $dataCantidadMes  = $ventasPorMes->pluck('cantidad'); // cantidad de ventas por mes

        // ---------- GRAFICO 3: PRODUCTOS BAJO STOCK ----------
        $labelsProductosBajos = $productosBajosStock->pluck('nombre');
        $dataProductosBajos   = $productosBajosStock->pluck('cantidad');

        // ---------- GRAFICO 4: ULTIMAS VENTAS ----------
        $labelsUltimasVentas = $ventasRecientes->map(function ($venta) {
            return 'Venta #'.$venta->id;
        });
        $dataUltimasVentas   = $ventasRecientes->pluck('total_venta');

        return view('modules.dashboard.home', compact(
            'titulo',
            'totalVentas',
            'cantidadVentas',
            'productosBajosStock',
            'ventasRecientes',
            'labelsMeses',
            'dataTotalMes',
            'dataCantidadMes',
            'labelsProductosBajos',
            'dataProductosBajos',
            'labelsUltimasVentas',
            'dataUltimasVentas'
        ));
    }
}
