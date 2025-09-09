<?php

namespace App\Http\Controllers\Admin;
use App\Models\Sale;
use App\Http\Controllers\Controller;


use App\Models\Venta;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Muestra todas las ventas realizadas con detalles del usuario y del auto.
     */
    public function index()
    {
        // Cargar las relaciones necesarias para mostrar en la vista
        $sales = Sale::with(['user', 'car'])->orderBy('sales_date', 'desc')->get();

        return view('admin.sales.index', compact('sales'));
    }
}
