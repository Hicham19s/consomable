<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

@if(Session::get('pseudo'))

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="https://www.sadeg.dz/">SADEG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            <a class="nav-item nav-link active font-weight-bolder" href="{{route('utilisateurs')}}">Utilisateurs<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link active font-weight-bolder" href="{{route('categories')}}">Categories</a>
            <a class="nav-item nav-link disabled font-weight-bolder text-justify-right" href="#">{{session()->get('pseudo')}}</a>
            <a class="nav-item nav-link active font-weight-bolder" href="{{route('deconnection')}}">Deconnexion</a>
            </div>
        </div>
    </nav>
@endif

<body>

            @yield('content')
</body>
</html>