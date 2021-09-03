<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Venta;

class Producto extends Model
{
    use HasFactory;
    public function Venta(){
        return $this->belongsToMany(Venta::class);
    }
}
