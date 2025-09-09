@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenido Administrador') }}
                </div>

                <div class="col-sm-3">
                    <a href="{{ route('admin.user.index') }}">Usuarios</a>
                </div>
                <div class="col-sm-3">
                    <a href="{{ route('admin.cars.index') }}">Autos</a>
                </div>
                <div class="col-sm-3">
                    <a href="{{ route('admin.sales.index') }}">Ventas</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
