<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
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
        return view('productos.index', ['productos'=>Producto::all(), 'fondo'=>'fondo1.jpg']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create', ['productos'=>Producto::all(), 'fondo'=>'fondo1.jpg']);
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
            'nombre'=>['required', 'string', 'max:255'],
            'tipo'=>'required',
            'precio'=>['required', 'integer'],
            'cantidad_disponible'=>'required',
            'img'=>'required',
        ]);
        $nuevo = new Producto();
        $nuevo ->nombre = $request->get('nombre');
        $nuevo ->tipo = $request->tipo;
        $nuevo ->precio = $request->get('precio');
        $photo = $request->file('img');
        $filename = time() . '.' . $photo->getClientOriginalExtension();
        $destino=public_path('imagenes/productos/');
        $request->img->move($destino, $filename);
        $nuevo ->imagen = $filename;
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
    public function show($id)
    {
        return view('productos.show', [
            'producto'=>Producto::findOrFail($id),
            'productos'=>Producto::all(),
            'fondo'=>'fondo1.jpg']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos.edit', ['producto'=>$producto, 'fondo'=>'fondo1.jpg']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productoUpdt = Producto::find($id);
        $productoUpdt ->nombre = $request->get('nombre');
        $productoUpdt ->tipo = $request->get('tipo');
        $productoUpdt ->precio = $request->get('precio');
        $productoUpdt ->cantidad_disponible = $request->get('cantidad_disponible');
        $photo = $request->file('img');
        $filename = time() . '.' . $photo->getClientOriginalExtension();
        $destino=public_path('imagenes/productos/');
        $request->img->move($destino, $filename);
        $productoUpdt ->imagen = $filename;
        $productoUpdt -> save();
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect('/productos');
    }
    public function drop($id)
    {
        $dropProduct = Producto::find($id);
        return view('productos.drop', ['dropProduct'=>$dropProduct, 'fondo'=>'fondo1.jpg']);
    }
}
