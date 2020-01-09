@extends('layouts/admin')

<div id="page-wrapper" class="gray-bg dashbard-1">
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

    <div class="article-form-fields">
        <form method="POST" action="{{route('admin-articles-save', ['id' => $article->id])}}">
            {{csrf_field()}}
            <label for="articleName">Название:</label>
            <input id="articleName" type="text" name="articleName" value="{{$article->name}}">
                <div class="article-form-text">
                    <label for="articleText">Текст:</label>
                    <textarea id="articleText" type="text" name="articleText">{{$article->text}}</textarea>
                </div>
                <div class="controls">
                    <button class="button" type="submit">
                        Сохранить
                    </button>
                </div>
        </form>
    </div>

</div>
