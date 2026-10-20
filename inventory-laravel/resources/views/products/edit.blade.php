@extends('layouts.app')

@section('content')
    <h2>Edit Produk</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Nama Produk:</label><br>
            <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
        </div><br>
        <div>
            <label>Kategori:</label><br>
            <select name="category" required>
                <option value="Donut" {{ $product->category == 'Donut' ? 'selected' : '' }}>Donut</option>
                <option value="Drink" {{ $product->category == 'Drink' ? 'selected' : '' }}>Drink</option>
            </select>
        </div><br>
        <div>
            <label>Harga (Rp):</label><br>
            <input type="number" name="price" value="{{ old('price', $product->price) }}" required>
        </div><br>
        <div>
            <label>Stok:</label><br>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required>
        </div><br>
        <div>
            <label>Gambar Produk (Biarkan kosong jika tidak diubah):</label><br>
            <input type="file" name="image">
        </div><br>
        <button type="submit">Update Produk</button>
        <a href="{{ route('products.index') }}">Batal</a>
    </form>
@endsection