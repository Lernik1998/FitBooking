<html>

<head>
    <title>@yield('Title', 'Título predeterminado')</title>
    <!-- Para enlazar los CSS -->
    @yield('CSS')
    <link rel="icon" href="{{ asset('images/ownimgs/Logo.png') }}" type="image/png" sizes="16x16">
</head>

<body>
    @yield('Header') {{--Este es el header --}}

    @yield('Content') {{--Aqui irá el contenido del body --}}

    @yield('Footer') {{--Este es el footer --}}
</body>

</html>