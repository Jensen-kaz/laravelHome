@extends('layouts/app')

@section('content')
<div class="top-right links">
    @auth
        @foreach($currentUser->roles as $role)
            @if ($role->name == 'admin')
                <a href="{{route('admin-index')}}">Админка</a>
            @endif
        @endforeach
    @endauth

    @if (Route::has('login'))
            @auth
                <a href="{{ route('articles') }}">Home</a>
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
    @endif
</div>
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
@endsection
