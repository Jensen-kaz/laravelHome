@extends('layouts/app')

@section('content')
    <h1 class="article_list__title">{{$title}}</h1>
<div class="article_list__list-articles">
    <div class="article_list__list-articles--inner">
    @foreach($articles as $article)
        <div class="article_list__item">
            <a class="btn_articles" href="/articles/view/{{$article->id}}">{{$article->name}}</a>
        </div><br/>
    @endforeach
    </div>
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
