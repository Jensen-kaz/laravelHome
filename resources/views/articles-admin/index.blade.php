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

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-9">
                    <h1>Статьи</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{url('/admin')}}">Главная</a>
                    </li>
                    <li class="active">
                        <strong>Статьи</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-3">
                <div class="title-action">

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                    {!! $grid !!}
                </div>
            </div>
        </div>
    </div>

{{--    @include('vendor.admin-grid.grid')--}}
@endsection
