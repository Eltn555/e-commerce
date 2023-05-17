<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('mobile.categories.index', compact('categories'));
    }

    public function create() {

    }

    public function store(Request $request) {
        $data = $request->all();
        Category::create($data);
        return redirect()->route('mobile.categories');
    }

    public function show($id) {
        $category = Category::find($id);
        return view('mobile.categories.show', compact('category'));
    }
}
