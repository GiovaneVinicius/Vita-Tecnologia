<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('includes.head')
    <body>
        @include('includes.header')
        @yield('content')
        @include('includes.scripts')
        @yield('scripts')
    </body>
</html>