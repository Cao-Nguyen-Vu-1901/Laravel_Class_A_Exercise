<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Product\CreateRequest;
use App\Http\Requests\Web\Product\UpdateRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getList();
        return view('products.list', ['items' => $products]);
    }

    public function show($id)
    {
        $product = $this->productService->getDetail($id);
        
        if (!$product) {
            return redirect()->route('products.index')->with('error','Product not found');
        }
        return view('products.show', ['product' => $product]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(CreateRequest $createRequest){
        $request = $createRequest->validated();
        $result = $this->productService->store($request);
        
        if ($result) {
            return redirect()->route('products.index')->with('success', 'Create success');
        }
        
        return redirect()->route('products.index')->with('error', 'Create failed');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(UpdateRequest $updateRequest, Product $product)
    {
        $request = $updateRequest->validated();
        $result = $this->productService->update($product, $request);

        if ($result) {
            return redirect()->route('products.index')->with('success','Update success');
        }
        
        return redirect()->route('products.index')->with('error','Update failed');
    }

    public function destroy($id)
    {
        $product = $this->productService->destroy($id);
        if($product){
            return redirect()->route('products.index')->with('success', 'Delete success');
        }
        return redirect()->back()->with('error', 'Product not found');
    }
    
}
