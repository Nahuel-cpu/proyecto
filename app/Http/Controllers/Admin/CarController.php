<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
        ]);
         $car = new Car($request->only(['brand', 'model', 'year', 'price', 'stock']));
         if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('cars', 'public');
    }
    $car->save();

        return redirect()->route('admin.cars.index')->with('success', 'Auto agregado correctamente.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
         $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048',
                    ]);

        $car->fill($request->only(['brand', 'model', 'year', 'price', 'stock']));

        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            $car->image = $request->file('image')->store('cars', 'public');
    }
    $car->save();

        return redirect()->route('admin.cars.index')->with('success', 'Auto actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Auto eliminado correctamente.');
    }
}
