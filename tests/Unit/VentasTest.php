<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\VentaController;
use App\Models\Venta;


class VentasTest extends TestCase
{
    /**
     * A test to index ventas
     *
     * @return void
     */
    public function test_index_ventas()
    {
        $venta = new Venta();
        $venta->id = 1;
        $venta->fecha_venta = '2022-04-27';
        $venta->nombre_cliente = 'Mariana Giraldo';
        $venta->vendedor_id = 1;
        $lista_ventas[] = $venta;

        $index = (new VentaController)->getVentasList($lista_ventas);
        $this->assertSame($lista_ventas,  $index);
    }

    /**
     * A test to saving ventas
     *
     * @return void
     */
    public function test_store_ventas()
    {
        $venta = new Venta();
        $venta->id = 1;
        $venta->nombre_cliente = 'Mariana Giraldo';

        $data = (new VentaController)->createNewVenta(null, true);
        $this->assertSame($venta->nombre_cliente,  $data->nombre_cliente);
    }

    /**
     * A test to getventa by its id
     *
     * @return void
     */
    // public function test_get_venta_by_id()
    // {
    //     $venta = (new VentaController)->createNewVenta(null, true);
    //     $data = (new VentaController)->getVentaById(null, true);
    //     $this->assertSame($venta->id,  $data->id);
    // }

    // public function test_update_venta_by_id()
    // {
    //     $venta = (new VentaController)->createNewventa(null, true);
    //     $venta->nombre = 'Manzana';
    //     $data = (new VentaController)->updateventaById(null, 1, true);
    //     $this->assertSame($venta->nombre,  $data->nombre);
    // }

    // public function test_destroy_venta_by_id()
    // {
    //     $id = 1;
    //     $venta = (new VentaController)->destroy($id, true);
    //     $this->assertSame($venta,  $id);
    // }
}
