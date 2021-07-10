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
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- jqury -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <a class="nav-item nav-link {{request()->is('utilisateurs') ? 'active' :''}} font-weight-bolder" 
                  href="{{route('utilisateurs')}}">Utilisateurs<span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link {{request()->is('categories') ? 'active' :''}} font-weight-bolder" 
                href="{{route('categories')}}">Categories</a>
                <a class="nav-item nav-link {{!request()->is('utilisateurs','categories','livraisons',
                  'effectuerdemandelivraison','prevision',) ? 'active' :''}} font-weight-bolder" 
                href="{{route('demandesp')}}">Demandes de prestation</a>

                <a class="nav-item nav-link {{url()->current()==route('demandeslivDGSI') ? 'active' :''}} font-weight-bolder" 
                href="{{route('demandeslivDGSI')}}">Demandes de livraisons</a>
                <a class="nav-item nav-link {{url()->current()==route('effectuerdemandelivraison') ? 'active' :''}} font-weight-bolder" 
                href="{{route('effectuerdemandelivraison')}}">Effectuer une demande de livraison</a>
                <a class="nav-item nav-link {{url()->current()==route('prevision') ? 'active' :''}} font-weight-bolder" 
                href="{{route('prevision')}}">Prevision trimestrielle</a>
                </div>
        @endif
        @if(Session::get('nomservice')=='SAG')
        <div class="mr-auto navbar-nav">
            <a class="nav-item nav-link {{url()->current()==route('demandeslivraisonssag') ? 'active' :''}} font-weight-bolder" 
              href="{{route('demandeslivraisonssag')}}">Demandes livraisons</a>
          </div>
        @endif
        @if(Session::get('nomservice')=='Agent_Service')
        <div class="mr-auto navbar-nav">
            <a class="nav-item nav-link {{url()->current()==route('demandespagenttraitees') ? 'active' :''}} font-weight-bolder" 
              href="{{route('demandespagenttraitees')}}">Demandes Traitées</a>
            <a class="nav-item nav-link {{url()->current()==route('demandespagentnontraitees') ? 'active' :''}} font-weight-bolder" 
              href="{{route('demandespagentnontraitees')}}">Demandes Non Traitées</a>
            <a class="nav-item nav-link {{url()->current()==route('effectuerdemandesagent') ? 'active' :''}} font-weight-bolder" 
              href="{{route('effectuerdemandesagent')}}">Effectuer une demande</a>
          </div>
        @endif

            <div class="d-flex">
              <a class="nav-item nav-link font-weight-bolder text-justify-right btn btn-link" 
              data-toggle="modal" 
              data-target="#VoirMonProfil" style="color:rgb(242 250 252);"  href="#">
              Profile {{session()->get('pseudo')}}</a>
              <a class="nav-item nav-link active font-weight-bolder" style="color:rgba(0, 0, 0, 0.9);" href="{{route('deconnection')}}">Deconnexion</a>
            </div>
        </div>
    </nav>
@endif
        <div class="modal fade" id="VoirMonProfil">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 350px;">
                        <div class="modal-header">
                            <h4 class="modal-title">Mon profil:</h4>              
                            <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body fluid ">
                        @livewire('voir-profil')

 
                        </div>
                    </div>
                </div>
        </div>

<body>

            @yield('content')
</body>
@livewireScripts

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