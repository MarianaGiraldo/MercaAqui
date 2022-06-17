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
        return Venta::all()->toJson();
    }

    public function getProductsList (Request $request)
    {
        return Producto::all()->toJson();
    }

    public function getUsersList (Request $request)
    {
        return User::where('is_admin', 0)->get()->toJson();
    }
}
