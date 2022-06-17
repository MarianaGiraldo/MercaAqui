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

        return response()->json($ventas, 200);
    }

    public function getProductsList (Request $request)
    {
        $products = Producto::all()->toArray();

        return response()->json($products, 200);
    }

    public function getUsersList (Request $request)
    {
        $users = User::all()->toArray();

        return response()->json($users, 200);
    }
}
