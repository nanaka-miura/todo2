@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
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
                <form class="update" action="">
                    <div class="update-form">
                        <input class="update-form__input" type="text" value="{{$todo->content}}">
                    </div>
                    <div class=update-form__button>
                        <button class="update-form__button--submit" type="submit">更新</button>
                    </div>
                </form>
            </td>
            <td class="list__delete">
                <form class="delete" action="">
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