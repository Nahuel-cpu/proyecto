<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'brand',
        'model',
        'year',
        'price',
        'stock',
        'image',
    ];
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    // Relación: un auto puede tener muchas ventas
}
