<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

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
        return view('ventas.index', ['ventas'=>$this->getVentasList(), 'fondo'=>'fondo2.jpg']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ventas.create', ['ventas'=>$this->getVentasList(), 'productos'=>Producto::all(), 'current' =>Carbon::now()->toDateString(), 'fondo'=>'fondo2.jpg']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'fecha_venta'=>'required',
            'nombre_cliente'=>'required',
            'productos' =>'required | min:1'
        ]);
        $nuevaVenta = $this->createNewVenta($request);
        $nuevaVenta->total = 0;
        $nuevaVenta->save();

        $productosChecked = $request->productos;
        $total = 0;

        foreach ($productosChecked as $productoId) {
            $producto = Producto::findOrFail($productoId);
            $cantidad = $request->get($productoId);
            $producto->cantidad_disponible = $producto->cantidad_disponible - $cantidad;
            $total = $total + $producto->precio * $cantidad;
            $producto-> save();

            $nuevaVenta->producto()->attach($producto->id);
            DB::table('producto_venta')
             ->orderBy('id', 'desc')
             ->limit(1)
             ->update(['cantidad' => $cantidad]);

        }
        $nuevaVenta->total = $total;
        $nuevaVenta-> save();

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

        }

        return view('ventas.show', [
            'venta'=>$venta,
            'productos'=>$productos,
            'total'=>$total,
            'vendedor'=>$vendedor,
            'fondo'=>'fondo2.jpg']);
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
        $productos = Producto::all();
        $producto_ventas = DB::table('producto_venta');
        return view('ventas.edit', [
            'venta'=>$venta,
            'producto_ventas'=>$producto_ventas,
            'productos'=>$productos,
            'fondo'=>'fondo2.jpg']);
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
        $validator = Validator::make($request->all(), [
            'fecha_venta'=>'required',
            'nombre_cliente'=>'required',
            'productos' =>'required | min:1'
        ]);
        $ventaUpd = Venta::findOrFail($id);
        $ventaUpd ->fecha_venta = $request->get('fecha_venta');
        $ventaUpd ->nombre_cliente = $request->get('nombre_cliente');
        $ventaUpd -> save();

        $productosChecked = $request->productos;
        $total = 0;

        foreach ($productosChecked as $productoId) {
            $producto = Producto::findOrFail($productoId);
            $cantidad = $request->get($productoId);
            $producto_venta = DB::table('producto_venta')
                            ->where('producto_id', $productoId)
                            ->where('venta_id', $ventaUpd->id);
            $total = $total + $producto->precio * $cantidad;
            if($producto_venta->doesntExist()){
                $cantidad = $request->get($productoId);
                $producto->cantidad_disponible = $producto->cantidad_disponible - $cantidad;
                $producto-> save();
                $ventaUpd->producto()->attach($producto->id);
            }else{
                $producto->cantidad_disponible = $producto->cantidad_disponible +
                                                ($producto_venta->value('cantidad') - $cantidad);
                $producto-> save();
            }
            DB::table('producto_venta')
              ->where('producto_id', $productoId)
              ->where('venta_id', $ventaUpd->id)
              ->update(['cantidad' => $cantidad]);
        }
        $ventaUpd->total = $total;
        $ventaUpd->save();
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
        return view('ventas.drop', ['ventas'=>$dropVenta, 'fondo'=>'fondo2.jpg']);
    }

    /**
     * Return the list of the ventas
     * @param $list custom list of the ventas
     * @return $list
     */
    public function getVentasList($list = null)
    {
        return $list ?? Venta::all();
    }

    /**
     * Creates an new venta from request if not generates one
     * @param \Illuminate\Http\Request  $request
     * @param $flag_test
     * @return Venta $venta
     */
    public function createNewVenta($request = null, $flag_test = false)
    {
        $venta = new Venta();
        if (isset($request)) {
            $venta->fecha_venta = $request->get('fecha_venta');
            $venta->nombre_cliente = $request->get('nombre_cliente');
            $venta->vendedor_id = Auth::user()->id;
        } elseif ($flag_test) {
            $venta->id = 1;
            $venta->fecha_venta = '2022-04-27';
            $venta->nombre_cliente = 'Mariana Giraldo';
            $venta->vendedor_id = 1;
        }
        return $venta;
    }
}
