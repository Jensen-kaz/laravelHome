@extends('layouts/app')

@section('content')
    <h1 class="title">{{$title}}</h1>
<div class="list-articles">
    @foreach($articles as $article)
        <a href="/articles/view/{{$article->id}}">{{$article->name}}</a><br/>
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
