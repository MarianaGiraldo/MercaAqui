<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ventas.index', ['ventas'=>ventas::all(), 'fondo'=>'#f6ec9c']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventas.create', ['ventas'=>ventas::all(), 'fondo'=>'#ccb8e6']);
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
            'vendedor_id'=>'required',
        ]);
        $nuevaVenta = new user();
        $nuevaVenta ->fecha_venta = $request->get('fecha_venta');
        $nuevaVenta ->nombre_cliente = $request->get('nombre_cliente');
        $nuevaVenta ->vendedor_id = $request->get('vendedor_id');

        $nuevaVenta -> save();
        return redirect('/ventas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        $venta=ventas::findOrFail($id);
        return view('ventas.show', [
            'ventas'=>ventas::findOrFail($id),
            'ventas'=>ventas::all(),
            'fondo'=>'#91a5f5']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        $venta = ventas::findOrFail($id);
        return view('ventas.edit', ['ventas'=>$venta, 'fondo'=>'#97d992']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        $ventaUpdt = ventas::find($id);
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
    public function destroy(Venta $venta)
    {
        ventas::destroy($id);
        return redirect('/ventas');
    }
    public function drop($id)
    {
        $dropVenta=ventas::find($id);
        return view('ventas.drop', ['ventas'=>$dropVenta, 'fondo'=>'#f3d46f']);
    }
}
