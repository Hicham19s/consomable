
@extends('layouts.app')
@section('content')
<body>
  {{$ViewDemendeId}}
<div class="container-fluid mt-5">
  <div  class="row flex-xl-nowrap mx-auto pt-2 pb-1">

    <div class="col-md-3 col-xl-3 bd-sidebar" style="background-color:#d6d8db;">
        <div class="container">
        <ul>
                    <li><a class="btn btn-link {{url()->current()==route('categories') ? 'font-weight-bolder' :''}}" href="{{route('categories')}}">Categories</a></li>
                    <li><a class="btn btn-link {{url()->current()==route('prevision') ? 'font-weight-bolder' :''}}" href="{{route('prevision')}}">Les previsions trimestrielles</a></li>
                    <li><a class="btn btn-link {{url()->current()==route('demandespToutes') ? 'font-weight-bolder' :''}}" href="{{route('demandespToutes')}}">Historique des demandes de prestations</a></li>
                    <li><a class="btn btn-link {{url()->current()==route('demandesp') ? 'font-weight-bolder' :''}}" href="{{route('demandesp')}}">Les demandes de prestations</a></li>
                    <li><a class="btn btn-link {{url()->current()==route('demandeslivDGSI') ? 'font-weight-bolder' :''}}" href="{{route('demandeslivDGSI')}}">Les demandes de livraisons</a></li>
                    <li><a class="btn btn-link {{url()->current()==route('utilisateurs') ? 'font-weight-bolder' :''}}" href="{{route('utilisateurs')}}">Utilisateurs</a></li>
                    <li><a class="btn btn-link" data-toggle="modal"  data-target="#VoirMonProfil">Voir mon profil</a></li>
                </ul> 
        </div>
    </div>
        <div class="p-1 col-md-11 col-xl-8 pl-md-1 bd-content ">
            <div class="container p-2">
  <div class="container">
  <div class="col-md-6 justify-content-center">
                          @if(Session::get('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button class="close" data-dismiss="alert">X</button>
                                {{Session::get('success')}}
                            </div>
                          @endif
                      </div>
                          
     

  <ul class="nav nav-tabs" role="tablist">
    
    <li class="nav-item">
      <a class="nav-link @if($ViewDemendeId==1)
                          active
                         @endif" data-toggle="tab" href="#DemandesnontraiteesID">Demandes non traitees</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($ViewDemendeId==2)
                          active
                         @endif " data-toggle="tab" href="#DemandesenattentedevalidationID">Demandes en attente de  validation</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($ViewDemendeId==3)
                          active
                         @endif" data-toggle="tab" href="#DemandeenattenteID">Demande en attente</a>
    </li>
  </ul>
 
    <div class="tab-content">  

        <div id="DemandesnontraiteesID" class="container tab-pane  @if($ViewDemendeId==1)
                                                                    active
                                                                   @else
                                                                    fade
                                                                   @endif " 
        style="height: 347px;width: 768px;overflow-y: auto;"><br>
        @include('demande.d1', ['Demandesnontraitees' => $Demandesnontraitees])
        </div>

        <div id="DemandesenattentedevalidationID" class="container tab-pane  @if($ViewDemendeId==2)
                                                                              active
                                                                             @else
                                                                              fade
                                                                             @endif "
        style="height: 347px;width: 768px;overflow-y: auto;"><br>
        @include('demande.d2', ['Demandesenattentedevalidation' => $Demandesenattentedevalidation])
        </div>

       <div id="DemandeenattenteID" class="container tab-pane   @if($ViewDemendeId==3)
                                                                active
                                                               @else
                                                                fade
                                                               @endif"
       style="height: 347px;width: 768px;overflow-y: auto;"><br>
       @include('demande.d3', ['Demandeenattente' => $Demandeenattente])
        </div> 
       
    </div>
</div>               
                                    
            </div> 
        </div>

  </div>
</div>
</body>
@endsection
