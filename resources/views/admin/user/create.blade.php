@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <strong>Crear usuario</strong>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-secondary">Volver al listado</a>
                    </div>

                    <div class="card-body">
                        {{-- Mensajes de éxito --}}
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- Errores de validación --}}
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Campos del formulario --}}
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                            </div>
                            <div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>
                        </div>

                        {{-- Roles --}}
                        <div class="mb-3">
                            <label><strong>Roles</strong></label><br>
                            @foreach ($roles as $role)
                                <label class="me-3">
                                    <input type="checkbox" name="roles[]" value="{{ $role->name }}"> {{ $role->name }}
                                </label>
                            @endforeach
                        </div>

                        {{-- Permisos --}}
                        <div class="mb-3">
                            <label><strong>Permisos</strong></label><br>
                            @foreach ($permissions as $permission)
                                <label class="me-3">
                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"> {{ $permission->name }}
                                </label>
                            @endforeach
                        </div>

                        {{-- Botón de envío --}}
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Guardar usuario</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
