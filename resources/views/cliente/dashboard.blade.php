@extends('layouts.app')

@section('content')
<h1>Bienvenido al panel de cliente</h1>
<p>Desde aquí puedes explorar autos disponibles y realizar compras.</p>
<a href="{{ route('cliente.cars') }}">Ver autos disponibles</a>
@endsection
