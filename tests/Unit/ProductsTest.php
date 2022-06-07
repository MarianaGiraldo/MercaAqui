<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;

class ProductsTest extends TestCase
{

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
    public function test_get_product_by_id()
    {
        $product = (new ProductoController)->createNewProduct(null, true);
        $data = (new ProductoController)->getProductById(null, true);
        $this->assertSame($product->id,  $data->id);
    }

    /**
     * Test for update Product function
     *
     * @return void
     */
    public function test_update_product_by_id()
    {
        $product = (new ProductoController)->createNewProduct(null, true);
        $product->nombre = 'Manzana';
        $data = (new ProductoController)->updateProductById(null, 1, true);
        $this->assertSame($product->nombre,  $data->nombre);
    }

    /**
     * Test for destroy Product function
     *
     * @return void
     */
    public function test_destroy_product_by_id()
    {
        $id = 1;
        $product = (new ProductoController)->destroy($id, true);
        $this->assertSame($product,  $id);
    }
}
