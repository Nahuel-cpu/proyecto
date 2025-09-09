<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function purchase(Request $request, Car $car)
    {
        if ($car->stock < 1) {
            return redirect()->route('cliente.cars')->with('error', 'Este auto ya no está disponible.');
        }

        Sale::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
            'sales_date' => now(),
        ]);

        $car->decrement('stock');

        return redirect()->route('cliente.cars')->with('success', 'Compra realizada, gracias');
    }

    public function cancel()
    {
        return redirect()->route('cliente.cars')->with('error', 'Compra cancelada');
    }
}
