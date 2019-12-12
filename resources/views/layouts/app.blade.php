<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.blocks.head')
<body>
@if(!in_array(Route::current()->getName(), ['login', 'register']))
    @include('layouts.blocks.headerBlock')
@endif
<div>@yield('content')</div>
</body>
@include('layouts.blocks.footer')
</html>
