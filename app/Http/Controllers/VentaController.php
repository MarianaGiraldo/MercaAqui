<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ventas.index', ['ventas'=>Venta::all(), 'fondo'=>'fondo1.jpg']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventas.create', ['ventas'=>Venta::all(), 'productos'=>Producto::all(), 'fondo'=>'fondo1.jpg']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'fecha_venta'=>'required',
            'nombre_cliente'=>'required',
        ]);
        $nuevaVenta = new Venta();
        $nuevaVenta ->fecha_venta = $request->get('fecha_venta');
        $nuevaVenta ->nombre_cliente = $request->get('nombre_cliente');
        $nuevaVenta ->vendedor_id = Auth::user()->id;
        $nuevaVenta -> save();

        $producto = Producto::findOrFail(1);
        $nuevaVenta->producto()->attach($producto->id);
        return redirect('/ventas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta=Venta::findOrFail($id);
        return view('ventas.show', [
            'venta'=>$venta,
            'ventas'=>Venta::all(),
            'fondo'=>'fondo1.jpg']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        return view('ventas.edit', ['ventas'=>$venta, 'fondo'=>'fondo1.jpg']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ventaUpdt = Venta::find($id);
        $ventaUpdt ->fecha_venta = $request->get('fecha_venta');
        $ventaUpdt ->nombre_cliente = $request->get('nombre_cliente');
        $ventaUpdt ->vendedor_id = $request->get('vendedor_id');
        $ventaUpdt -> save();

        return redirect('/ventas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Venta::destroy($id);
        return redirect('/ventas');
    }
    public function drop($id)
    {
        $dropVenta=Venta::find($id);
        return view('ventas.drop', ['ventas'=>$dropVenta, 'fondo'=>'fondo1.jpg']);
    }
}
