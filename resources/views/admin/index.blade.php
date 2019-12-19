@extends('layouts/app')

@section('content')
    <div class="currentUser">
        <span class="currentUser_info">Пользователь: </span>
        @auth
            <span>{{$currentUser->name}}</span><br/>
            <span>{{$currentUser->email}}</span>
        @else
            <span>Вы не авторизованы</span>
        @endauth
    </div>

    <div>
        <h1>Админка</h1>
    </div>
@endsection
