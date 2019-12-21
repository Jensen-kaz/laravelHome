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
<div class="article-content">
    <div class="article_title">
        {{$article->name}}
    </div>
    <div class="inner">
        {!! $article->text !!}
    </div>
    <div class="comments">
        <h2 style="text-align: center; padding-top: 20px">{{$titleComment}}</h2>
{{--        @if (Session::has('comment_unauth_user'))--}}
{{--            <div class="jsErrorNotAuth jsAuthScroll" style="margin: 15px;">--}}
{{--                <div style="font-weight: bold; color: orange;" class="flashMessageError">{{ Session::get('comment_unauth_user') }}</div>--}}
{{--                <div class="authBlock">--}}
{{--                    <a href="{{ route('login') }}">Авторизация</a>--}}
{{--                    <a href="{{ route('register') }}">Регистрация</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
        @foreach($article->comments as $comment)
            <div class="block">
                <div class="inner">
                    <div class="comment-body">
                        <div class="comment-body__photo">
                            <img src="{{asset('images/user-logo.png')}}">
                        </div>
                        <div class="comment-body__info">
                            <div class="comment-body__info--author">
                                {{$comment->author['name']}}
                            </div>
                            <div class="comment-body__info--text">
                                {{$comment->text}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <form method="POST" action="{{route('comment-add')}}">
            {{csrf_field()}}
            <input style="display: none" id="articleId" type="text" name="articleId" value="{{$article->id}}">
            <div class="comment-form-fields">
                <label for="commentText">Ваш комментарий:</label>
                <textarea id="commentText" type="text" name="commentText"></textarea>
                <div class="controls">
                    <button class="button" type="submit">
                        Оставить комментарий
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
