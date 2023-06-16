@extends('layouts.app')

@section('content')
    <h1 class="display-4 text-center mb-4">Produk EZ Store</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('products.updateStockForm', ['id' => $product->id]) }}" class="btn btn-success btn-sm">Update Stock</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin Untuk Menghapusnya?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
