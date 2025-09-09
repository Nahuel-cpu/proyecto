@extends('layouts.admin')

@section('content')
<h1>Ventas realizadas</h1>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Email</th>
            <th>Auto</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Año</th>
            <th>Precio</th>
            <th>Fecha de compra</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->user->name }}</td>
                <td>{{ $sale->user->email }}</td>
                <td>#{{ $sale->car->id }}</td>
                <td>{{ $sale->car->brand }}</td>
                <td>{{ $sale->car->model }}</td>
                <td>{{ $sale->car->year }}</td>
                <td>${{ number_format($sale->car->price, 2) }}</td>
                <td>
                 {{ $sale->sales_date ? \Carbon\Carbon::parse($sale->sales_date)->format('d/m/Y H:i') : 'Sin fecha' }}
</td>

            </tr>
        @endforeach
    </tbody>
</table>
@endsection
