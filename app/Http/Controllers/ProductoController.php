<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('productos.index', ['productos'=>productos::all(), 'fondo'=>'#add8e6']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create', ['productos'=>productos::all(), 'fondo'=>'#ccb8e6']);
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
            'nombre'=>'required',
            'tipo'=>'required',
            'precio'=>'required',
            'cantidad_disponible'=>'required',
        ]);
        $nuevo = new productos();
        $nuevo ->nombre = $request->get('nombre');
        $nuevo ->tipo = $request->get('tipo');
        $nuevo ->precio = $request->get('precio');
        $nuevo ->cantidad_disponible = $request->get('cantidad_disponible');
        $nuevo -> save();
        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(productos $producto)
    {
        return view('productos.show', ['id'=>$id ,'productos'=>productos::findOrFail($id), 'productos'=>productos::all(), 'fondo'=>'#91a5f5']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $productos = productos::findOrFail($id);
        return view('productos.edit', ['productos'=>$productos, 'fondo'=>'#97d992']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $productoUpdt = productos::find($id);
        $productoUpdt ->nombre = $request->get('nombreEdit');
        $productoUpdt ->tipo = $request->get('tipoEdit');
        $productoUpdt ->precio = $request->get('precioEdit');
        $productoUpdt ->cantidad_disponible = $request->get('cantidadEdit');
        $productoUpdt -> save();
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        productos::destroy($id);
        return redirect('/productos');
    }
    public function drop($id)
    {
        $dropProduct = productos::find($id);
        return view('productos.drop', ['dropProduct'=>$dropProduct, 'fondo'=>'#f3d46f']);
    }
}
