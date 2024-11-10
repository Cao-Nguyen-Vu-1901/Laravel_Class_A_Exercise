@extends('layouts.master')

@section('title', 'Create product')

@section('styles') 
<style>
    .btn {
        padding: 8px 16px;
        text-decoration: none;
        font-size: 14px;
        border-radius: 4px;
        display: inline-block;
        color: #fff;
    }
</style>
@stop

@section('content')
@yield('breadcrumb')

<h2 class="product-title">Thông tin Sản phẩm</h2>

<div class="product-detail">
    <p class="product-name">Tên sản phẩm: {{ $product->name }}</p>
    <p class="product-description">Mô tả: {{ $product->description }}</p>
    <p class="product-price">Giá: {{ number_format($product->price, 0, ',', '.') }} VND</p>
    <a href="{{ route('products.index') }}" class="btn btn-edit">Back</a>
</div>


@stop