<!-- <div> -->
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
<!-- </div> -->
<!-- resources/views/cart/view.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Your Cart</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        @foreach($cartItems as $item)
            <li>
                <p>{{ $item->product->name }} - {{ $item->quantity }} x {{ $item->product->price }} USD</p>
                <p>Total: {{ $item->quantity * $item->product->price }} USD</p>
            </li>
        @endforeach
    </ul>

    <p>Total: {{ $cartItems->sum(function($item) { return $item->quantity * $item->product->price; }) }} USD</p>
    <a href="{{ route('checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
@endsection
