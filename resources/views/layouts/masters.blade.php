<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') | Test App</title>
    @include('layouts.head-css')
</head>

<body>
    @include('layouts.navbar')
    <div class="container">

        @yield('content')

    </div>
    @include('layouts.footer')
    @include('layouts.footer-js')
</body>

</html>