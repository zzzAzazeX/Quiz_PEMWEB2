@extends('layouts.app')

@section('content')
    <h1 class="display-4 text-center mb-4">Produk Detail</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text"><strong>Harga:</strong> {{ $product->price }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $product->stock }}</p>
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Kembali</a>
@endsection
