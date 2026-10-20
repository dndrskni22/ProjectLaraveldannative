@extends('layouts.app')

@section('content')
    <h2>Tambah Produk Baru</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Nama Produk:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div><br>
        <div>
            <label>Kategori:</label><br>
            <select name="category" required>
                <option value="Donut">Donut</option>
                <option value="Drink">Drink</option>
            </select>
        </div><br>
        <div>
            <label>Harga (Rp):</label><br>
            <input type="number" name="price" value="{{ old('price') }}" required>
        </div><br>
        <div>
            <label>Stok:</label><br>
            <input type="number" name="stock" value="{{ old('stock') }}" required>
        </div><br>
        <div>
            <label>Gambar Produk:</label><br>
            <input type="file" name="image">
        </div><br>
        <button type="submit">Simpan Produk</button>
        <a href="{{ route('products.index') }}">Batal</a>
    </form>
@endsection