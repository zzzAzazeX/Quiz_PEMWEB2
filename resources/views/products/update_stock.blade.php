@extends('layouts.app')

@section('content')
    <h1 class="display-4 text-center mb-4">Update Stock</h1>
    <form action="{{ route('products.updateStock', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="stock">Jumlah Stok Baru</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Stock</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
