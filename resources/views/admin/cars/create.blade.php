@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4 class="mb-4 text-center">Agregar nuevo auto</h4>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data" class="border p-4 rounded shadow-sm bg-white">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Marca</label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Modelo</label>
                    <input type="text" name="model" class="form-control" value="{{ old('model') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Año</label>
                    <input type="number" name="year" class="form-control" value="{{ old('year') }}" min="1900" max="{{ date('Y') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stock disponible</label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Imagen del auto</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-dark">Guardar auto</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
