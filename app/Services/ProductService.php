<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    protected $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getList()
    {
        return $this->product->withTrashed()->get();
    }

    public function getDetail($id)
    {
        return $this->product->withTrashed()->where('id',  $id )->first();
    }

    public function store($product) 
    {
        return $this->product->create($product);
    }

    public function update($product, $params)
    {
        return $product->update($params);
    }

    public function destroy($id)
    {
        $product = $this->product->where('id', $id);
        
        if (!$product) {
            return false;
        }
    
        $product->delete();
        return true;
    }
}
