<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.header')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        @include('layouts.navbar')
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @section('scripts')
        @include('layouts.footer')
    @show
</body>
</html>
