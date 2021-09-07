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
        return view('ventas.index', ['ventas'=>Venta::all(), 'fondo'=>'fondo1.jpg']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventas.create', ['ventas'=>Venta::all(), 'fondo'=>'fondo1.jpg']);
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
        $nuevaVenta = new Venta();
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
    public function show($id)
    {
        $venta=Venta::findOrFail($id);
        return view('ventas.show', [
            'ventas'=>Venta::findOrFail($id),
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
