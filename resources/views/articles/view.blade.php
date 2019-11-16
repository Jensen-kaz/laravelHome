@extends('layouts/app')

@section('content')
<div style="display: flex; flex-direction: row; justify-content: space-between" class="currentUser">
    <div>
        <span>Пользователь</span>
        @auth
            <span>{{$currentUser->name}}</span><br/>
            <span>{{$currentUser->email}}</span>
        @else
            <span>Вы не авторизованы</span>
        @endauth
    </div>
    <div>
        <a href="{{route('welcome')}}">Home</a>
    </div>
</div>
<div style="padding: 0 40px" class="article-content">
    <div class="inner">
        {!! $article->text !!}
    </div>
    <div class="comments">
        <h2 style="text-align: center; padding-top: 20px">{{$titleComment}}</h2>
        @if (Session::has('comment_unauth_user'))
            <div style="margin: 15px;">
                <div style="font-weight: bold; color: orange;" class="flashMessageError">{{ Session::get('comment_unauth_user') }}</div>
                <div style="padding: 10px; border: 1px solid orange; box-shadow: coral" class="authBlock">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                </div>
            </div>
        @endif
        @foreach($article->comments as $comment)
            <div class="comment-body">
                <div style="font-weight: bold" class="comment-author">
                    {{$comment->author['name']}}
                </div>
                <div style="margin: 7px" class="comment-text">
                    {{$comment->text}}
                </div>
            </div>
        @endforeach
        <form method="POST" action="{{route('comment-add')}}">
            {{csrf_field()}}
            <input style="display: none" id="articleId" type="text" name="articleId" value="{{$article->id}}">
            <input id="commentText" type="text" name="commentText">
            <button type="submit">
                Оставить комментарий
            </button>
        </form>
    </div>
</div>
@endsection
