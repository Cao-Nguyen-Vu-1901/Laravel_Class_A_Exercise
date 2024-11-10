@extends('layouts.master')

@section('title', 'Create product')

@section('styles') 
<style>
    .btn {
        padding: 10px 15px;
        color: #fff;
        background-color: #4CAF50;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #388E3C;
    }
</style>
@stop

@section('content')
@yield('breadcrumb')
<h1>Edit Product</h1>

<form action="{{ route('products.store') }}" method="POST" class="edit-product-form">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        @if ($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="price" step="1" required>
        @if ($errors->has('price'))
        <span class="text-danger">{{ $errors->first('price') }}</span>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Create Product</button>
    <a href="{{ route('products.index') }}" class="btn btn-edit">Back</a>
</form>
</div>
</div>
@stop