@extends('layouts.master')

@section('title', 'Create product')

@section('styles')
<style>
</style>
@stop

@section('content')
@yield('breadcrumb')
<h1>Edit Product</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST" class="edit-product-form">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
        @if ($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" step="1" required>
        @if ($errors->has('price'))
        <span class="text-danger">{{ $errors->first('price') }}</span>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Update Product</button>
    <a href="{{ route('products.index') }}" class="btn btn-edit">Back</a>
</form>


@stop