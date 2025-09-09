@extends('layouts.app')

@section('content')
<h1>Autos disponibles</h1>

@if(session('success'))
    <div style="color:green;">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div style="color:red;">{{ session('error') }}</div>
@endif

@foreach($cars as $car)
    @if($car->stock > 0)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:15px;">
        <img src="{{ asset('storage/' . $car->image) }}" width="200">
        <p><strong>Marca:</strong> {{ $car->brand }}</p>
        <p><strong>Modelo:</strong> {{ $car->model }}</p>
        <p><strong>Año:</strong> {{ $car->year }}</p>
        <p><strong>Precio:</strong> ${{ number_format($car->price, 2) }}</p>
        <p><strong>Stock disponible:</strong> {{ $car->stock }}</p>

        <form method="POST" action="{{ route('cliente.purchase', $car->id) }}" onsubmit="return confirm('¿Deseas comprar este auto? Rellena tus datos')">
            @csrf
            <button type="submit">Comprar</button>
        </form>

        <form method="GET" action="{{ route('cliente.cancel') }}" onsubmit="return confirm('¿Deseas cancelar la compra?')">
            <button type="submit">Cancelar</button>
        </form>
    </div>
    @endif
@endforeach
@endsection
