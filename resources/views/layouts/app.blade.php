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

    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#77a8d8 ;">
        <a class="navbar-brand" href="https://www.sadeg.dz/">SADEG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        @if(Session::get('nomservice')=='DGSI')
            <div class="mr-auto navbar-nav">
                <a class="nav-item nav-link active font-weight-bolder" href="{{route('utilisateurs')}}">Utilisateurs<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link active font-weight-bolder" href="{{route('categories')}}">Categories</a>
                <a class="nav-item nav-link active font-weight-bolder" href="{{route('demandesp')}}">Demandes de prestation</a>
            </div>
        @endif
        @if(Session::get('nomservice')=='Agent_Service')
          <div class="mr-auto navbar-nav">
            <a class="nav-item nav-link active font-weight-bolder" href="{{route('demandespagenttraitees')}}">Demandes Traitées</a>
            <a class="nav-item nav-link active font-weight-bolder" href="{{route('demandespagentnontraitees')}}">Demandes Non Traitées</a>
            <a class="nav-item nav-link active font-weight-bolder" href="{{route('demandespagentnontraitees')}}">Effectuer une demande</a>
          </div>
        @endif

            <div class="d-flex">
              <a class="nav-item nav-link disabled font-weight-bolder text-justify-right" style="color:rgb(242 250 252);"  href="#">{{session()->get('pseudo')}}</a>
              <a class="nav-item nav-link active font-weight-bolder" style="color:rgba(0, 0, 0, 0.9);" href="{{route('deconnection')}}">Deconnexion</a>
            </div>
        </div>
    </nav>
@endif

<body>

            @yield('content')
</body>
<footer class=" p-2 text-center text-lg-start" style="background-color:#77a8d8;color:#2a1000;" >

  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">SADEG</h6>
          <p>
            Société algérienne de distribution d’électricité et de gaz.
          </p>
        </div>
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i> Béjaia,cité Tobale</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">ffff.com</a>
  </div>
  <!-- Copyright -->
</footer>
</html>