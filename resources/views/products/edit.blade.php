<!-- <div> -->
    <!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
<!-- </div> -->
<!-- resources/views/products/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
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
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ $product->description }}</textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" value="{{ $product->price }}">
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
@endsection
