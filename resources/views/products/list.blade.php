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

<style>
    /* Toàn bộ trang */
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        color: #333;
        margin: 0;
        padding: 20px;
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

    /* Nút hành động */
    .btn {
        padding: 8px 16px;
        text-decoration: none;
        font-size: 14px;
        border-radius: 4px;
        display: inline-block;
        color: #fff;
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