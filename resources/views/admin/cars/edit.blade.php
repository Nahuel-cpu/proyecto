@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4 class="mb-4 text-center">Editar auto</h4>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.cars.update', $car) }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow-sm bg-white">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Marca</label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand', $car->brand) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Modelo</label>
                    <input type="text" name="model" class="form-control" value="{{ old('model', $car->model) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Año</label>
                    <input type="number" name="year" class="form-control" value="{{ old('year', $car->year) }}" min="1900" max="{{ date('Y') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $car->price) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stock disponible</label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock', $car->stock) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Imagen actual</label><br>
                    @if($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" alt="Auto" class="img-fluid mb-2" style="max-height: 150px;">
                    @else
                        <span class="text-muted">Sin imagen</span>
                    @endif
                    <input type="file" name="image" class="form-control mt-2">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-dark">Actualizar auto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
