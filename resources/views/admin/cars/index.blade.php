@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Stock de Autos</h4>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Volver</a>
                <a href="{{ route('admin.cars.create') }}" class="btn btn-dark">Agregar auto</a>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Imagen</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Año</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cars as $car)
                                <tr>
                                    <td>
                                        @if($car->image)
                                            <img src="{{ asset('storage/' . $car->image) }}" alt="Auto" style="height: 60px;">
                                        @else
                                            <span class="text-muted">Sin imagen</span>
                                        @endif
                                    </td>
                                    <td>{{ $car->brand }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>${{ number_format($car->price, 2) }}</td>
                                    <td>{{ $car->stock }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.cars.edit', $car) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                        <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar auto?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">No hay autos en stock.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
