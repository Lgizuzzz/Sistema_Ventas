<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Compras extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Compras';
        $items = Compra::select(
            'compras.*', 'users.name as nombre_usuario', 'productos.nombre as nombre_producto'
        )
        ->join('users', 'compras.user_id', '=', 'users.id')
        ->join('productos', 'compras.producto_id', '=', 'productos.id')
        ->get();
        return view('modules.compras.index', compact('titulo', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $titulo = 'Comprar Productos';
        $item = Producto::find($id);
        return view('modules.compras.create', compact('titulo', 'item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $item = new Compra();
            $item->user_id = Auth::user()->id;
            $item->producto_id = $request->id;
            $item->cantidad = $request->cantidad;
            $item->precio_compra = $request->precio_compra;
            if ($item->save()) {
                $item = Producto::find($request->id);
                $item->cantidad = ($item->cantidad + $request->cantidad);
                $item->precio_compra = $request->precio_compra;
                $item->save();
            }
            return to_route('productos')->with('success', 'Compra Exitosa!!');
        } catch (\Throwable $th) {
            return to_route('productos')->with('error', 'No se pudo comprar!!' .$th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $titulo = 'Compras';
        $items = Compra::select(
            'compras.*', 'users.name as nombre_usuario', 'productos.nombre as nombre_producto'
        )
        ->join('users', 'compras.user_id', '=', 'users.id')
        ->join('productos', 'compras.producto_id', '=', 'productos.id')
        ->where('compras.id', $id)
        ->first();
        return view('modules.compras.show', compact('titulo', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $titulo = 'Editar Compra';
        $item = Compra::select(
            'compras.*', 'users.name as nombre_usuario', 'productos.nombre as nombre_producto'
        )
        ->join('users', 'compras.user_id', '=', 'users.id')
        ->join('productos', 'compras.producto_id', '=', 'productos.id')
        ->where('compras.id', $id)
        ->first();
        return view('modules.compras.edit', compact('titulo', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $cantidad_anterior = 0;
            $item = Compra::find($id);
            $cantidad_anterior = $item->cantidad;
            $item->cantidad = $request->cantidad;
            $item->precio_compra = $request->precio_compra;
            if ($item->save()) {
                $item = Producto::find($request->producto_id);
                $cantidad_anterior = $item->cantidad - $cantidad_anterior;
                $item->cantidad = $cantidad_anterior + $request->cantidad;
                $item->save();
            }
            return to_route('compras')->with('success', 'Compra Actualizada con Exito!!');
        } catch (\Throwable $th) {
            return to_route('compras')->with('error', 'No se pudo Actualizar la compra!!' .$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        try {
            $item = Compra::find($id);
            $cantidad_compra = $item->cantidad;
            if ($item->delete()) {
                $item = Producto::find($request->producto_id);
                $item->cantidad = $item->cantidad - $cantidad_compra;
                $item->save();
                return to_route('compras')->with('success', 'Compra Eliminada con Exito!!');
            } else {
                return to_route('compras')->with('error', 'Compra no se elimino!!');
            }
        } catch (\Throwable $th) {
            return to_route('compras')->with('error', 'No se pudo Elimiinar la compra!!' .$th->getMessage());
        }
    }
}
