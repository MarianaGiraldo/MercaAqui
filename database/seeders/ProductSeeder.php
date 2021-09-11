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
            'imagen'=>'1631399799.jfif', 
            'nombre'=>'Manzana', 
            'tipo' => 'Alimentos frescos', 
            'precio' => '1500', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'1631300605.jpg', 
            'nombre'=>'Coca-Cola 1.5', 
            'tipo' => 'Bebidas', 
            'precio' => '3500', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'1631300605.jpg', 
            'nombre'=>'Arroz 500g', 
            'tipo' => 'Alimentos Empacados', 
            'precio' => '1500', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'1631300605.jpg', 
            'nombre'=>'Helado de chocolate - 1L', 
            'tipo' => 'Alimentos Congelados', 
            'precio' => '10000', 
            'cantidad_disponible'=> 500 ]);
        Producto::create([
            'imagen'=>'1631300605.jpg', 
            'nombre'=>'Shampoo Pantene', 
            'tipo' => 'Cuidado Personal', 
            'precio' => '15000', 
            'cantidad_disponible'=> 500 ]);
            
    }
}
