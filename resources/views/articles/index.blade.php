@extends('layouts/app')

@section('content')
    <h1 class="title">{{$title}}</h1>
<div class="list-articles">
    @foreach($articles as $article)
        <div style="padding: 5px;">
            <a style="font-size: 17px; font-weight: bold;" href="/articles/view/{{$article->id}}">{{$article->name}}</a>
        </div><br/>
    @endforeach
</div>
    <div class="currentUser">
        <span>Пользователь: </span>
        @auth
            <span>{{$currentUser->name}}</span><br/>
            <span>{{$currentUser->email}}</span>
        @else
            <span>Вы не авторизованы</span>
        @endauth
    </div>
@endsection
