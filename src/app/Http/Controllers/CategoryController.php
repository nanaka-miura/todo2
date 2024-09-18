<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('category', ['categories' => $categories]);
    }

    public function store(CategoryRequest $request) {
        $form = $request->all();
        Category::create($form);
        return redirect('categories')->with('message', 'カテゴリを作成しました');
    }
}
