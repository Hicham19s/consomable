
@extends('layouts.app')
@section('content')
<body>
<div class="container-fluid ">
  <div  class="row flex-xl-nowrap mx-auto pt-1 pb-1">

    <div class="col-md-3 col-xl-3 bd-sidebar" style="background-color:#d6d8db;">
        <div class="container">
              <ul>
              <li><a href="">dd</a></li>
              <li><a href="">fff</a></li>
              <li><a href="">ttt</a></li>
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
      <a class="nav-link active" data-toggle="tab" href="#DemandeseffectueesID">Demandes effectuées</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#DemandesenattenteID">Demandes en attente</a>
    </li>
  </ul>
 
    <div class="tab-content">
        <div id="DemandeseffectueesID" class="container tab-pane  active " 
        style="height: 347px;width: 768px;overflow-y: auto;"><br>
        @include('demandeAgent.DemandesAgentEffectees', ['Demandeseffectuees' => $Demandeseffectuees])

        </div>


        <div id="DemandesenattenteID" class="container tab-pane fade "
        style="height: 347px;width: 768px;overflow-y: auto;"><br>
        @include('demandeAgent.DemandesAgentEnAttente', ['Demandesenattente' => $Demandesenattente])

        </div>
    </div>
</div>               
                                    
            </div> 
        </div>

  </div>
</div>
</body>
@endsection
