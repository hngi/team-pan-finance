<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts._head')
<body>
    <div id="app">
       <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
