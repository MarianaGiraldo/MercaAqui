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
        $lista = $this->getProductsList();
        return view('productos.index', ['productos'=> $lista, 'fondo'=>'fondo2.jpg']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create', ['productos'=>$this->getProductsList(), 'fondo'=>'fondo2.jpg']);
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
        $nuevo = $this->createNewProduct($request);
        $nuevo-> save();
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
            'producto'=>$this->getProductById($id),
            'productos'=>$this->getProductsList(),
            'fondo'=>'fondo2.jpg']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto =$this->getProductById($id);
        return view('productos.edit', ['producto'=>$producto, 'fondo'=>'fondo2.jpg']);
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
        $productoUpdt = $this->getProductById($id);
        $productoUpdt->nombre = $request->get('nombre');
        $productoUpdt->tipo = $request->get('tipo');
        $productoUpdt->precio = $request->get('precio');
        $productoUpdt->cantidad_disponible = $request->get('cantidad_disponible');
        if($request->file('img') !== null) {
            $photo = $request->file('img');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $destino=public_path('imagenes/productos/');
            $request->img->move($destino, $filename);
            $productoUpdt->imagen = $filename;
        };
        $productoUpdt-> save();
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
        return view('productos.drop', ['dropProduct'=>$dropProduct, 'fondo'=>'fondo2.jpg']);
    }

    public function getProductsList($lista = null)
    {
        return $lista ?? Producto::all();
    }

    public function createNewProduct($request = null, $flag_test = false)
    {
        $producto = new Producto();
        if (isset($request)) {
            $producto->nombre = $request->get('nombre');
            $producto->tipo = $request->tipo;
            $producto->precio = $request->get('precio');
            $photo = $request->file('img');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $destino=public_path('imagenes/productos/');
            $request->img->move($destino, $filename);
            $producto->imagen = $filename;
            $producto->cantidad_disponible = $request->get('cantidad_disponible');
        } elseif ($flag_test) {
            $producto->id = 1;
            $producto->nombre = 'Papel higienico';
            $producto->tipo = 'Basicos del hogar';
            $producto->precio = '2000';
            $producto->cantidad_disponible = 50;
        }
        return $producto;
    }

    public function getProductById($id = null, $flag_test = false)
    {
        if (isset($id)) {
            return Producto::findOrFail($id);
        } elseif ($flag_test) {
           return $this->createNewProduct(null, $flag_test);
        }
    }

    public function updateProductById($request, $id, $flag_test = false)
    {
        if ($request !== null) {
            $productoUpdt = $this->getProductById($id);
            $productoUpdt->nombre = $request->get('nombre');
            $productoUpdt->tipo = $request->get('tipo');
            $productoUpdt->precio = $request->get('precio');
            $productoUpdt->cantidad_disponible = $request->get('cantidad_disponible');
            if($request->file('img') !== null) {
                $photo = $request->file('img');
                $filename = time() . '.' . $photo->getClientOriginalExtension();
                $destino=public_path('imagenes/productos/');
                $request->img->move($destino, $filename);
                $productoUpdt->imagen = $filename;
            };
        } elseif ($flag_test) {
            $productoUpdt = $this->getProductById(null, $flag_test);
            $productoUpdt->nombre = 'Manzana';
            $productoUpdt->tipo = 'Alimentos frescos';
            $productoUpdt->precio = '2000';
            $productoUpdt->cantidad_disponible = '100';
        }
        return $productoUpdt;
    }
}
