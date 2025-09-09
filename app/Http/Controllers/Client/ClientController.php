<?php

namespace App\Http\Controllers\Client;
use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function dashboard()
    {
        return view('cliente.dashboard');
    }
    
    public function cars()
    {
        $cars = Car::all();
        return view('cliente.cars', compact('cars'));
    }
}