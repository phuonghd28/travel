<!doctype html>
<html lang="en">
<head>
    @include('admin.components.head')
    <title>
        @yield('title')
    </title>
    @yield('custom_css')
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    @include('admin.components.header')
    <div class="app-main">
        @include('admin.components.sidebar')
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="container">
                    @yield('content')
                </div>
            </div>
            @include('admin.components.footer')
        </div>
    </div>
</div>
@include('admin.components.script')
@yield('custom_js')
<div id="fb-root"></div>
</body>
</html>
