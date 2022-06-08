<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'imagen'=>'https://i0.wp.com/historiasdelahistoria.com/wordpress-2.3.1-ES-0.1-FULL/wp-content/uploads/2015/09/manzana.jpg?fit=580%2C500&ssl=1', 
            'nombre'=>'Manzana', 
            'tipo' => 'Alimentos frescos', 
            'precio' => '1500', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'https://assets.stickpng.com/thumbs/580b57fbd9996e24bc43c0de.png', 
            'nombre'=>'Coca-Cola 1.5', 
            'tipo' => 'Bebidas', 
            'precio' => '3500', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'https://jumbocolombiaio.vtexassets.com/arquivos/ids/186323/7702511000045.jpg?v=637813981860700000', 
            'nombre'=>'Arroz 500g', 
            'tipo' => 'Alimentos Empacados', 
            'precio' => '1500', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'https://www.mercadoslpineda.co/4696-thickbox_default/helado-colombina-tarro-x-1-litro-chocolate.jpg', 
            'nombre'=>'Helado de chocolate - 1L', 
            'tipo' => 'Alimentos Congelados', 
            'precio' => '10000', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'https://images.ctfassets.net/jdgtuh2uadx0/3lk7R3IIj1CaeTj1uoOIiu/74cd7a13549f28d202d4f10fa1c0a2c7/SHAMPOO-CARB__N-ACTIVADO_-PURIFICACI__N-CAPILAR.png', 
            'nombre'=>'Shampoo Pantene', 
            'tipo' => 'Cuidado Personal', 
            'precio' => '15000', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'https://lh3.googleusercontent.com/WrpFYHI4bRE1Mg2rYnoTz4xMtKe-uSysI8hisFG9uPE6_pWYgXCu0M4KDhaISmoUNAF3-c2nIZ51R9gpg1QsWx1rUZp1Ls8_SgfZ', 
            'nombre'=>'Papel Higienico Familia', 
            'tipo' => 'Aseo', 
            'precio' => '8500', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'https://colombiavinos.com/wp-content/uploads/2020/09/corona.jpg', 
            'nombre'=>'Six Pack Corona', 
            'tipo' => 'Bebidas', 
            'precio' => '24500', 
            'cantidad_disponible'=> 500 ]);
    }
}
