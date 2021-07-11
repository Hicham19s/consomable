
@extends('layouts.app')
@section('content')
<body>
<div class="container-fluid mt-5">
  <div  class="row flex-xl-nowrap mx-auto pt-2 pb-1">

      <div class="col-md-3 col-xl-3 bd-sidebar" style="background-color:#d6d8db;">
          <div class="container">
          <ul>
            <li><a class="btn btn-link" href="{{route('demandespagentnontraitees')}}">Demandes effectuées</a></li>
            <li><a class="btn btn-link" href="{{route('demandespagenttraitees')}}">Demandes acceptées</a></li>
            <li><a class="btn btn-link" href="{{route('demandespagenttraitees')}}">Demandes refusées</a></li>
            <li><a class="btn btn-link" href="{{route('demandespagentnontraitees')}}">Demandes en attente</a></li>
            <li><a class="btn btn-link" data-toggle="modal"  data-target="#VoirMonProfil">Voir mon profil1</a></li>
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
              <a class="nav-link active" data-toggle="tab" href="#DemandesaccepteesID">Demandes acceptées</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#DemandesrefuseesID">Demandes refusées</a>
            </li>
          </ul>
 
          <div class="tab-content">
            <div id="DemandesaccepteesID" class="container tab-pane  active " 
            style="height: 347px;width: 768px;overflow-y: auto;"><br>
            @include('demandeAgent.DemandesAgentAcceptees', ['Demandesacceptees' => $Demandesacceptees])
            </div>
            <div id="DemandesrefuseesID" class="container tab-pane fade "
            style="height: 347px;width: 768px;overflow-y: auto;"><br>
            @include('demandeAgent.DemandesAgentRefusees', ['Demandesrefusees' => $Demandesrefusees])
            </div> 
          </div>
      </div>               
                                    
    </div> 
  </div>

  </div>
</div>
</body>
@endsection
