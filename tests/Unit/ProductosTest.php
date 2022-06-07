<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductosTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A test to index products
     *
     * @return void
     */
    public function test_index()
    {
        $producto = new Producto();
        $producto->id = 1;
        $producto->nombre = 'Papel higienico';
        $producto->tipo = 'Basicos del hogar';
        $producto->precio = '2000';
        $producto->cantidad_disponible = 50;
        $lista_productos[] = $producto;

        $index = (new ProductoController)->getProductsList($lista_productos);
        $this->assertSame($lista_productos,  $index);
    }

    /**
     * A test to index products
     *
     * @return void
     */
    public function test_store()
    {
        $producto = new Producto();
        $producto->id = 1;
        $producto->nombre = 'Papel higienico';

        $data = (new ProductoController)->createNewProduct(null, true);
        $this->assertSame($producto->nombre,  $data->nombre);
    }
}
