<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use App\Models\Venta;

class ListsController extends Controller
{


    public function getVentasList (Request $request)
    {
        $ventas = Venta::all()->toArray();

        return json_encode($ventas);
    }

    public function getProductsList (Request $request)
    {
        $products = Producto::all()->toArray();

        return json_encode($products);
    }

    public function getUsersList (Request $request)
    {
        $users = User::all()->toArray();

        return json_encode($users);
    }
}
