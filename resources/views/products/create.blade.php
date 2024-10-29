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

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #333;
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
</style>
