<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    protected $table = 'sales';

    protected $fillable = [
        'user_id',
        'car_id',
        'sales_date',
    ];

    /**
     * Relación con el usuario que realizó la compra.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * Relación con el auto comprado.
     */
    public function car(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Car::class, 'car_id');
    }
}
