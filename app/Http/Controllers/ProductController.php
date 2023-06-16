<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $product = new Product();
        return view('products.index', compact('products', 'product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::create($validatedData);

        return redirect()->route('products.index')->with('success', 'Produk Telah Ditambahkan.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Produk Telah Diupdate.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk Telah Dihapus.');
    }

    public function availableProducts()
    {
        $availableProducts = Product::where('stock', '>', 0)->get();
        
        return view('products.available', ['availableProducts' => $availableProducts]);
    }

    public function unavailableProducts()
    {
        $unavailableProducts = Product::where('stock', '=', 0)->get();

        return view('products.unavailable', ['unavailableProducts' => $unavailableProducts]);
    }

    public function updateStockForm($id)
    {
        $product = Product::findOrFail($id);
        
        return view('products.update_stock', compact('product'));
    }

    public function updateStock(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate(['stock' => 'required|integer|min:0',]);
        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Stock Produk Telah Diupdate.');
    }

}

