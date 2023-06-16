@extends('layouts.app')

@section('content')
    <h1 class="display-4 text-center mb-4">Unavailable Stock</h1>
    <a href="{{ route('products.index') }}" class="btn btn-light mb-3" ><b>Home</b></a>
    <a href="{{ route('products.create') }}" class="btn btn-light mb-3" ><b>Tambah Product</b></a>
    <a href="{{ route('products.available') }}" class="btn btn-light mb-3"><b>Available Stock</b></a>
    <a href="{{ route('products.unavailable') }}" class="btn btn-light mb-3"><b>Unavailable Stock</b></a>
    <table class="table table-dark table-hover">
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
