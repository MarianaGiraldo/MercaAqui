<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'fecha_venta'=>'required',
            'nombre_cliente'=>'required',
            'productos' =>'required | min:1'
        ]);
        $nuevaVenta = new Venta();
        $nuevaVenta ->fecha_venta = $request->get('fecha_venta');
        $nuevaVenta ->nombre_cliente = $request->get('nombre_cliente');
        $nuevaVenta ->vendedor_id = Auth::user()->id;
        $nuevaVenta -> save();

        $productosChecked = $request->productos;

        foreach ($productosChecked as $productoId) {
            $producto = Producto::findOrFail($productoId);
            $cantidad = $request->get($productoId);
            $producto->cantidad_disponible = $producto->cantidad_disponible - $cantidad;
            $producto-> save();

            $nuevaVenta->producto()->attach($producto->id);
            DB::table('producto_venta')
              ->orderBy('id', 'desc')
              ->limit(1)
              ->update(['cantidad' => $cantidad]);
            
        }

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
        $vendedor = User::findOrFail($venta->vendedor_id);
        $producto_ventas=DB::table('producto_venta')
            ->where('venta_id', $venta->id)->get();

        $productos=array();
        $total = 0;

        foreach ($producto_ventas as $producto_ventas) {
            $producto = Producto::findOrFail($producto_ventas->producto_id);
            $producto_array = (array)$producto;
            $producto_array['cantidad'] = $producto_ventas->cantidad;
            $producto_array['nombre'] = $producto->nombre;
            $producto_array['precio'] = $producto->precio;
            array_push($productos, $producto_array);
            $total = $total + $producto_array['precio'] * $producto_array['cantidad'];
        }

        return view('ventas.show', [
            'venta'=>$venta,
            'productos'=>$productos,
            'total'=>$total,
            'vendedor'=>$vendedor,
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
