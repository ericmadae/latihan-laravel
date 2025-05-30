<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    @auth        
    <nav id="navbar-example2" class="px-3 mb-3 navbar bg-body-tertiary">
        <a class="navbar-brand" href="#">Navbar</a>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/first') }}">First</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/post') }}">POST</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/second') }}">Second</a>
            </li>
            @can('access-admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/second') }}">Third</a>
            </li>
            @endcan
        </ul>
    </nav>
    @endauth
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
    </script>
</body>

</html>
