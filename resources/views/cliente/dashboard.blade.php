@extends('layouts.app')

@section('content')
<div class="container py-4">

    <!-- Bienvenida -->
    <div class="row justify-content-center mb-4">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header">{{ __('Dashboard del Cliente') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5 class="mb-0">Bienvenido al catálogo de autos</h5>
                    <p class="text-muted">Explorá los modelos disponibles y descubrí tu próximo vehículo.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Catálogo de Autos -->
    <h3 class="mb-3">Catálogo de Autos</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse($cars as $car)
            <div class="col">
                <div class="card h-100 shadow-sm border-0">
                    <div class="position-relative overflow-hidden" style="height: 200px;">
                        <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top h-100 w-100 object-fit-cover transition-hover" alt="{{ $car->brand }} {{ $car->model }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->brand }} - {{ $car->model }}</h5>
                        <p class="card-text mb-1">Año: {{ $car->year }}</p>
                        <p class="card-text mb-1">Precio: ${{ number_format($car->price, 2) }}</p>
                        <p class="card-text">Stock: {{ $car->stock }} unidades</p>
                    </div>
                    <div class="card-footer bg-white text-center border-0">
                        <a href="{{ route('autos.show', $car->id) }}" class="btn btn-primary w-75">Ver Detalles</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No hay autos disponibles en este momento.
                </div>
            </div>
        @endforelse
    </div>
</div>

<!-- Estilo para efecto hover -->
<style>
    .transition-hover {
        transition: transform 0.3s ease;
    }
    .transition-hover:hover {
        transform: scale(1.05);
    }
</style>
@endsection
