<!-- <div> -->
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
<!-- </div> -->
<!-- resources/views/products/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="200">
    <p>{{ $product->description }}</p>
    <p>Price: {{ $product->price }} USD</p>

    <form action="{{ route('cart.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit" class="btn btn-success">Add to Cart</button>
    </form>

    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>

            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Product</button>
            </form>
        @endif
    @endauth
@endsection
