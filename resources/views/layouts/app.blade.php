<!DOCTYPE html>
<html lang="en">

<head>

    @yield('meta')
    @stack('meta')

    @yield('css')
    @stack('css')

    @yield('title')

</head>

<body class="theme-color-1">

@yield('content')

@yield('js')
@stack('js')

</body>

</html>
