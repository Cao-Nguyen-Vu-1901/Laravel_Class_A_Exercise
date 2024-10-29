<h2 class="product-title">Thông tin Sản phẩm</h2>

<div class="product-detail">
    <p class="product-name">Tên sản phẩm: {{ $product->name }}</p>
    <p class="product-description">Mô tả: {{ $product->description }}</p>
    <p class="product-price">Giá: {{ number_format($product->price, 0, ',', '.') }} VND</p>
    <a href="{{ route('products.index') }}" class="btn btn-edit">Back</a>
</div>

<style>
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

    .btn {
        padding: 8px 16px;
        text-decoration: none;
        font-size: 14px;
        border-radius: 4px;
        display: inline-block;
        color: #fff;
    }

    .btn-edit {
        background-color: #28a745;
        border: 1px solid #28a745;
    }

    .btn-edit:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
</style>
