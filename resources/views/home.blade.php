<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <title>Document</title>
    @yield('head')
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('home') }}">Tasker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav menu">
                    <a class="option-active nav-item nav-link" href="{{ route('home') }}">Home</a>
                    <a class="option-active nav-item nav-link" href="{{ route('label') }}">Create Label</a>
                    <a class="option-active nav-item nav-link" href="{{ route('task')}}">Create task</a>
                </div>
            </div>
        </nav>
    </div>

    @yield('content')


    @yield('scripts')

</body>

</html>