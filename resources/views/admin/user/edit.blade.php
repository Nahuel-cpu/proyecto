@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4 class="mb-4 text-center">Editar usuario</h4>

            {{-- Mensajes de éxito --}}
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
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

            <form action="{{ route('admin.user.update', $user) }}" method="POST" class="border p-4 rounded shadow-sm bg-white">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña (obligatorio)</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="cambiar contraseña">
                    </div>
                    <div>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Roles</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($roles as $role)
                            <div class="form-check">
                                <input type="checkbox" name="roles[]" value="{{ $role->name }}" class="form-check-input" id="role_{{ $role->id }}"
                                    {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                <label class="form-check-label" for="role_{{ $role->id }}">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Permisos</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" class="form-check-input" id="perm_{{ $permission->id }}"
                                    {{ $user->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                <label class="form-check-label" for="perm_{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-dark">Actualizar usuario</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
