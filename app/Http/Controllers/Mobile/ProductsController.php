<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index () {
        $products = Product::all();
        return view('mobile.products.index', compact('products'));
    }
    public function create() {
        $categories = Category::all();
        return view('mobile.products.create', compact('categories'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $data['image'] = Storage::put('/images', $request['image']);
        Product::create($data);
        return redirect()->route('mobile.products');
    }

    public function edit($id){
        $categories = Category::all();
        $product = Product::find($id);
        return view('mobile.products.edit', compact('categories', 'product'));
    }

    public function update(ProductRequest $request, $id){
        $data = $request->validated();
        if(array_key_exists('image', $data))$data['image'] = Storage::put('/images', $request['image']);
        $product = Product::find($id);
        $product->update($data);
        return redirect()->route('mobile.products');
    }

    public function show($id){
        $product = Product::find($id);
        return view('mobile.products.show', compact('product'));
    }
}
