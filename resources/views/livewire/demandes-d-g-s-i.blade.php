<div>
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
                          <a class="nav-link " data-toggle="tab" href="#DemandesnontraiteesID">Demandes non traitees</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#DemandesenattentedevalidationID">Demandes en attente de  validation</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " data-toggle="tab" href="#DemandeenattenteID">Demande en attente</a>
                        </li>
                      </ul>
                   
                      <div class="tab-content">  

                          <div id="DemandesnontraiteesID" class="container tab-pane " 
                          style="height: 347px;width: 768px;overflow-y: auto;"><br>
                          @include('demande.d1', ['Demandesnontraitees' => $Demandesnontraitees])
                          </div>

                          <div id="DemandesenattentedevalidationID" class="container tab-pane active"
                          style="height: 347px;width: 768px;overflow-y: auto;"><br>
                          @include('demande.d2', ['Demandesenattentedevalidation' => $Demandesenattentedevalidation])
                          </div>

                         <div id="DemandeenattenteID" class="container tab-pane"
                         style="height: 347px;width: 768px;overflow-y: auto;"><br>
                         @include('demande.d3', ['Demandeenattente' => $Demandeenattente])
                          </div> 
                 
                      </div>
</div>
