@extends('layouts/admin')

@section('content')

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
    <div class="admin__title">
        <h1>Админка</h1>
    </div>

{{--    <div class="admin_list__list-sections">--}}
{{--        <div class="admin_list__list-sections--inner">--}}
{{--            <div class="admin_list__list__section">--}}
{{--                <a class="btn_section" href="{{url('admin/articles')}}">Статьи</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
@endsection
