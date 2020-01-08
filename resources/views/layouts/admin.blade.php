<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.blocks.headAdmin')
<body class="pace-done">
@if(!in_array(Route::current()->getName(), ['login', 'register']))
    @include('layouts.blocks.headerBlock')
@endif
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu" style="">
                <li class="active" style="width: 100%">
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Разделы</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse in">
                        <li class="active"><a href="{{url('admin/articles')}}">Статьи</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>
    @yield('content')
</div>
</body>
@include('layouts.blocks.footer')
</html>
