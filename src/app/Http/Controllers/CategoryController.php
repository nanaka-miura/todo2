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

    public function update(CategoryRequest $request)
    {
        $form = $request->only('name');
        $id = $request->input('id');
        unset($form['_token']);
        Category::find($request->id)->update($form);
        return redirect('/categories')->with('message', 'カテゴリを更新しました');
    }

    public function destory(Request $request)
    {
        $form = $request->only('name');
        $id = $request->input('id');
        Category::find($request->id)->delete($form);
        return redirect('/categories')->with('message','カテゴリを削除しました');
    }
}