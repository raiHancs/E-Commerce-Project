<!-- <div> -->
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
<!-- </div> -->
<!-- resources/views/products/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Create Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
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
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
        </div>
        <div>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" value="{{ old('price') }}">
        </div>
        <div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Save Product</button>
    </form>
@endsection
