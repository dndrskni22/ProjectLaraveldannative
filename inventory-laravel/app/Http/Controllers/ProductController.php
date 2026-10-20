<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|unique:products,name',
            'category' => 'required',
            'price'    => 'required|numeric|min:0',
            'stock'    => 'required|integer|min:0',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageName = 'default.png';
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        Product::create([
            'name'     => $request->name,
            'category' => $request->category,
            'price'    => $request->price,
            'stock'    => $request->stock,
            'image'    => $imageName,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'     => 'required|unique:products,name,' . $product->id,
            'category' => 'required',
            'price'    => 'required|numeric|min:0',
            'stock'    => 'required|integer|min:0',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imageName = $product->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
        }

        $product->update([
            'name'     => $request->name,
            'category' => $request->category,
            'price'    => $request->price,
            'stock'    => $request->stock,
            'image'    => $imageName,
        ]);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
    }
}