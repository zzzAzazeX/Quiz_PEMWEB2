@extends('layouts.app')

@section('content')
    <h1>Unavailable Stock</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unavailableProducts as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
