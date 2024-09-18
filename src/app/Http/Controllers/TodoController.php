<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use App\Models\Category;

class TodoController extends Controller
{
    public function index() {
        $todos = Todo::with('category')->get();
        $categories = Category::all();
        return view('index', ['todos' => $todos, 'categories' => $categories]);
    }

    public function store(TodoRequest $request) {
        $form = $request->only('content','category_id');
        Todo::create($form);
        return redirect('/')->with('message', 'Todoを作成しました');
    }

    public function update(TodoRequest $request) {
        $form = $request->only('content');
        $id = $request->input('id');
        unset($form['_token']);
        Todo::find($request->id)->update($form);
        return redirect('/')->with('message', 'Todoを更新しました');
    }

    public function destroy(Request $request) {
        $form = $request->only('content');
        $id = $request->input('id');
        Todo::find($request->id)->delete($form);
        return redirect('/')->with('message', 'Todoを削除しました');
    }

    public function search(Request $request)
    {
        $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();
        return view('index',compact('todos','categories'));
    }
}
