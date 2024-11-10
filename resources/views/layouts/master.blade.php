<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', '@Master Layout'))</title>

    {{--Styles css common--}}
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css') }}">

    @yield('style-libraries')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        /* Tiêu đề trang */
        .page-title {
            font-size: 24px;
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }

        /* Thông báo */
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-size: 14px;
            text-align: center;
            width: 80%;
            margin: 0 auto;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Bảng sản phẩm */
        .product-table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .product-header {
            background-color: #007bff;
            color: #fff;
            padding: 12px;
            text-align: left;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
        }

        .product-row:nth-child(even) {
            background-color: #f2f2f2;
        }

        .product-cell {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .product-title {
            font-size: 24px;
            color: #007bff;
            margin-bottom: 15px;
            text-align: center;
            font-weight: bold;
        }

        .product-detail {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-detail p {
            font-size: 18px;
            margin: 10px 0;
            line-height: 1.6;
        }

        .product-name {
            font-weight: bold;
            color: #333;
        }

        .product-description {
            color: #555;
        }

        .product-price {
            font-weight: bold;
            color: #d9534f;
        }

        .edit-product-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .text-danger {
            color: red;
            font-size: 0.9em;
        }

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

        .btn-create {
            background-color: white;
            border: 1px solid #007bff;
            color: #007bff;
            margin: 5px 0;
        }

        .btn-create:hover {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .btn-edit {
            background-color: white;
            border: 1px solid rgb(129, 142, 150);
            color: rgb(129, 142, 150);
            margin: 5px 0;
        }

        .btn-edit:hover {
            background-color: rgb(129, 142, 150);
            border-color: rgb(129, 142, 150);
            color: white;
        }

        .btn-show {
            background-color: white;
            border: 1px solid rgb(102, 195, 203);
            color: rgb(102, 195, 203);
            margin: 5px 0;
        }

        .btn-show:hover {
            background-color: rgb(102, 195, 203);
            border-color: rgb(102, 195, 203);
            color: white;
        }

        .btn-delete {
            background-color: white;
            border: 1px solid red;
            color: red;
            margin: 5px 0;
        }

        .btn-delete:hover {
            background-color: red;
            border-color: red;
            color: white;
        }
    </style>
    @yield('styles')
</head>

<body>
    @include('partial.header')

    @yield('content')

    {{--Scripts js common--}}
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js') }}"></script>
    {{--Scripts link to file or js custom--}}
    @yield('scripts')
</body>

</html>