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
    public function test_index_products()
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
     * A test to saving products
     *
     * @return void
     */
    public function test_store_products()
    {
        $producto = new Producto();
        $producto->id = 1;
        $producto->nombre = 'Papel higienico';

        $data = (new ProductoController)->createNewProduct(null, true);
        $this->assertSame($producto->nombre,  $data->nombre);
    }

    /**
     * A test to getproduct by its id
     *
     * @return void
     */
    public function test_getById()
    {
        $product = (new ProductoController)->createNewProduct(null, true);
        $data = (new ProductoController)->getProductById(null, true);
        $this->assertSame($product->id,  $data->id);
    }
}
