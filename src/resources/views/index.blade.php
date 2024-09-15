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
        <div class="create-form">
            <div class="create-form__input">
                <input type="text" name='content'>
            </div>
            <div class="create-form__button">
                <button class="create-form__button--submit">作成</button>
            </div>
        </div>
    </form>
    <table class="list">
        <tr class="list__row">
            <th>
                <h2 class="list__name">Todo</h2>
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
                    <div class=update-form__button>
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