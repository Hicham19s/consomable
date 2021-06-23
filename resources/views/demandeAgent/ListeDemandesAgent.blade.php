
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
              
      <div id="html" class="col-md-8 offset-md-4 p-2" style="padding-top: 30px;margin-left: 0px;margin-top: 40px;margin-right: 0;">
          <button data-toggle="modal" data-target="#formulaire" class="btn btn-primary" style="width: 160px;">create utilisateur</button>
              </ul> 
              
              <div class="modal fade" id="formulaire">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Nouvelle demande</h4>              
                            <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">
                                <form action="/demandesagent" method="post" >
                                @csrf
                                           <div class="form-group row">
                                               <div class="form-group" style="padding-left: 35px;">
                                                    <label class="label">Produit</label>
                                                    <div class="select">
                                                        <select name="produit_id">
                                                          
                                                          @foreach($produits as $produit)
                                                              <option value="{{ $produit->id }}">{{ $produit->designation }}</option>
                                                          @endforeach               
                                                                  </select>
                                                      </div>
                                             </div>

                                                <label for="quantite" class="col-md-4 col-form-label text-md-right">Quantite :</label>

                                                <div class="col-md-6">
                                                    <input id="quantite" type="text" class="form-control @error('quantite') is-invalid @enderror" name="quantite" value="{{ old('quantite') }}" required autocomplete="quantite">

                                                    @error('pseudo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                           

                                            <div class="form-group row mb-0 ">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Enregistrer
                                                    </button>
                                                    <a class="btn btn-primary" href="{{route('utilisateurs')}}" role="button">Annuler</a>
                                                </div>
                                            </div>
                                    </form>
                
                        </div>
                        </div>
                    </div>
              </div>
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
      <a class="nav-link active" data-toggle="tab" href="#DemandesnontraiteesID">Demandes non traitees</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#DemandesenattentedevalidationID">Demandes acceptée</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#DemandeenattenteID">Demande en attente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#Demandesrefusees">Demande refusée</a>
    </li>
  </ul>
 
    <div class="tab-content">
        <div id="DemandesnontraiteesID" class="container tab-pane  active " 
                style="height: 347px;width: 768px;overflow-y: auto;"><br>
                @include('demandeAgent.tableAgent', ['Demandeseffectuees' => $Demandeseffectuees])

        </div>

        <div id="DemandeenattenteID" class="container tab-pane fade"
                style="height: 347px;width: 768px;overflow-y: auto;"><br>
                @include('demandeAgent.tableAgentaccepte', ['Demandesacceptees' => $Demandesacceptees])

        </div> 

        <div id="Demandesenattente" class="container tab-pane fade "
                style="height: 347px;width: 768px;overflow-y: auto;"><br>
                @include('demandeAgent.tableAgentenattent', ['Demandesenattent' => $Demandesenattent])

        </div>


       <div id="Demandesrefusees" class="container tab-pane fade"
                style="height: 347px;width: 768px;overflow-y: auto;"><br>
                @include('demandeAgent.tableAgentrefusees', ['Demanderefusees' => $Demanderefusees])

        </div> 
       
       
    </div>
</div>               
                                    
            </div> 
        </div>

  </div>
</div>
</body>
@endsection
