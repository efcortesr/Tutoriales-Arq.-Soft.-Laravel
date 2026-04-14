<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplicación Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header text-center">
                <h2>@yield('title')</h2>
                <h5>@yield('subtitle')</h5>
            </div>
        </div>

        @yield('content')
    </div>
</body>

</html>