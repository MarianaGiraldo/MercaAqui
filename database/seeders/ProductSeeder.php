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
            'imagen'=>'manzana.jpg', 
            'nombre'=>'Manzana', 
            'tipo' => 'Alimentos frescos', 
            'precio' => '1500', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'coca.jpg', 
            'nombre'=>'Coca-Cola 1.5', 
            'tipo' => 'Bebidas', 
            'precio' => '3500', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'arroz.jpg', 
            'nombre'=>'Arroz 500g', 
            'tipo' => 'Alimentos Empacados', 
            'precio' => '1500', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'helado.jpg', 
            'nombre'=>'Helado de chocolate - 1L', 
            'tipo' => 'Alimentos Congelados', 
            'precio' => '10000', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'shampoo.jpg', 
            'nombre'=>'Shampoo Pantene', 
            'tipo' => 'Cuidado Personal', 
            'precio' => '15000', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'papelHigienico.png', 
            'nombre'=>'Papel Higienico Familia', 
            'tipo' => 'Aseo', 
            'precio' => '8500', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'corona.png', 
            'nombre'=>'Six Pack Corona', 
            'tipo' => 'Bebidas', 
            'precio' => '24500', 
            'cantidad_disponible'=> 500 ]);
    }
}
