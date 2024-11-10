@extends('layouts.master')

@section('title', 'List products')

@section('styles') 
<style> 
</style>
@stop

@section('content')
@yield('breadcrumb')

<h1 class="page-title">List product</h1>

@if (Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif

@if (Session::has('error'))
<div class="alert alert-error">{{ Session::get('error') }}</div>
@endif
<a href="{{ route('products.create') }}" class="btn btn-create">Create</a><br />
<table class="product-table">
    <thead>
        <tr>
            <th class="product-header">Name</th>
            <th class="product-header">Description</th>
            <th class="product-header">Price</th>
            <th class="product-header">Created at</th>
            <th class="product-header">Updated at</th>
            <th class="product-header">Deleted at</th>
            <th class="product-header">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr class="product-row">
            <td class="product-cell">{{ $item->name }}</td>
            <td class="product-cell">{{ $item->description }}</td>
            <td class="product-cell">{{ number_format($item->price, 0, ',', '.') }} VND</td>
            <td class="product-cell">{{ $item->created_at ? $item->created_at->format('Y-m-d') : ' ' }}</td>
            <td class="product-cell">{{ $item->updated_at ? $item->updated_at->format('Y-m-d') : ' ' }}</td>
            <td class="product-cell">{{ $item->deleted_at ? $item->deleted_at->format('Y-m-d') : ' ' }}</td>
            <td class="product-cell" id="button-container">
                <a href="{{ route('products.show', $item->id) }}" class="btn btn-edit">Detail</a><br />
                <a href="{{ route('products.edit', $item->id) }}" class="btn btn-show">Update</a><br />
                <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-edit btn-delete">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    const buttons = document.querySelectorAll('.btn-delete');

    buttons.forEach((button, index) => {
        button.addEventListener('click', () => {
            var result = confirm("Do you want delete ?");
            if (result === true)
                button.closest('form').submit();
        });
    });
</script>

@stop