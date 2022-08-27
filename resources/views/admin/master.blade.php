<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.includes.meta')
    <title>@yield('title')</title>
    @include('admin.includes.style')
</head>
<body class="fixed-navbar">
<div class="page-wrapper">
    @include('admin.includes.mini-header-right')
    @include('admin.includes.menu')
    <div class="content-wrapper">
        @yield('body')
        @include('admin.includes.footer')
    </div>
</div>
@include('admin.includes.theme')
@include('admin.includes.backdrop')
@include('admin.includes.script')
</body>
</html>
