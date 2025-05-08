@extends('main')

@section('container')
    <h1 class="text-center my-3">HALAMAN INDEX</h1>

    <a href="/products/create" class="btn btn-dark btn-sm mb-2">Add Product</a>
    <div class="table-responsive">
        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Color</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>
                            <img src="/storage/{{ $product->image }}" alt="{{ $product->image }}" class="img-thumbnail"
                                style="width: 80px">
                        </td>
                        <td>{{ $product->color }}</td>
                        <td>Rp{{ number_format($product->price) }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm">EDIT</a>
                            <form action="/products/{{ $product->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="confirm('are you sure?')">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
