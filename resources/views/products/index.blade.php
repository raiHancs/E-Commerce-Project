<!-- resources/views/products/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
        @endif
    @endauth
    <ul>
        @foreach($products as $product)
            <li>
                <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                <p>{{ $product->price }} USD</p>
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-success">Add to Cart</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
