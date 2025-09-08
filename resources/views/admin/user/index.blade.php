@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Usuarios</h4>
                <div class="btn-group">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Volver</a>
                    <a href="{{ route('admin.user.create') }}" class="btn btn-dark">Nuevo usuario</a>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Roles</th>
                                <th>Permisos</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                                    <td>{{ implode(', ', $user->getPermissionNames()->toArray()) }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                        <form action="{{ route('admin.user.destroy', $user) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No hay usuarios registrados.</td>
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
