@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

@if(session('message'))
<div class="success">{{session('message')}}</div>
@endif

@if($errors->any())
<div class="error">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="content">
    <form class="create" action="/todos" method="post">
        @csrf
        <div class="form__name">
            <h2>新規作成</h2>
        </div>
        <div class="create-form">
            <div class="create-form__input">
                <input type="text" name='content'>
            </div>
            <div class="create-form__category">
                <select class="create-form__category--select" name="category_id">
                    <option value="">カテゴリ</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="create-form__button">
                <button class="create-form__button--submit">作成</button>
            </div>
        </div>
    </form>
    <form class="search" action="/todos/search" method="get">
        @csrf
        <div class="form__name">
            <h2>Todo検索</h2>
        </div>
        <div class="search-form">
            <div class="search-form__input">
                <input type="text" name='keyword'>
            </div>
            <div class="search-form__category">
                <select class="search-form__category--select" name="category_id">
                    <option value="">カテゴリ</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="search-form__button">
                <button class="search-form__button--submit">検索</button>
            </div>
        </div>
    </form>
    <table class="list">
        <tr class="list__row">
            <th class="list__name">
                <h2 class="todo__name">Todo</h2>
                <h2 class="category__name">カテゴリ</h2>
            </th>
        </tr>
        @foreach($todos as $todo)
        <tr class="list__row">
            <td class="list__update">
                <form class="update" action="/todos/update" method="post">
                    @method('patch')
                    @csrf
                    <input type="hidden" name='id' value="{{$todo->id}}">
                    <div class="update-form">
                        <input class="update-form__input" type="text" name='content' value="{{$todo->content}}">
                    </div>
                    <div class="update-form__category">
                        <p>{{$todo['category']['name']}}</p>
                    </div>
                    <div class="update-form__button">
                        <button class="update-form__button--submit" type="submit">更新</button>
                    </div>
                </form>
            </td>
            <td class="list__delete">
                <form class="delete" action="/todos/delete" method="post">
                    @method('delete')
                    @csrf
                    <input type="hidden" name="id" value="{{$todo->id}}">
                    <div class="delete-form__button">
                        <button class="delete-form__button--submit" type="submit">削除</button>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection