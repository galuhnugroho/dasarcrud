@extends('main');

@section('container')
    <h1 class="text-center my-3">HALAMAN EDIT</h1>

    <a href="/products" class="btn btn-secondary mb-3">Kembali</a>
    <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="name" id="name"
                value="{{ old('name', $product->name) }}">
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" name="color" id="color"
                value="{{ old('color', $product->color) }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" id="price"
                value="{{ old('price', $product->price) }}">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" name="stock" id="stock"
                value="{{ old('stock', $product->stock) }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-dark">Edit</button>
    </form>
@endsection
