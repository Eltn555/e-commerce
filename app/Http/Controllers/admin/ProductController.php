<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        $products = Product::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.product.index', compact('products', 'categories'));
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.product.create', compact('categories', 'products'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['image'] = Storage::put('/images', $request['image']);
        Product::create($data);
        //dd($data);
        return redirect()->route('admin.products');
    }

    public function edit(ProductRequest $request, $id)
    {

        $data = $request->validated();
        if (array_key_exists('image', $data)) $data['image'] = Storage::put('/images', $request['image']);
        $product = Product::find($id);
        $product->update($data);
        return redirect()->route('admin.products');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products');
    }

    public function search(Request $request)
    {
        $products = Product::where('title', 'Like', '%' . $request['search'] . '%')
            ->orWhere('description', 'Like', '%' . $request->search . '%')
            ->orderBy($request->sort)->paginate(8);
        $output = '';
        $categories = Category::all();
        foreach ($products as $product) {
            $output .= view('admin.product.search.productSearch', compact('product', 'categories'));
        }
        return $output;
    }

}
