@if ($Demandesenattentedevalidation->count())     
<table class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">
                                               
  <thead class="table-secondary font-weight-bolder text-capitalize">
    <th scope="col">demandeur</th>
    <th scope="col">date de demande </th>
    <th scope="col">table des produits</th>
    <th scope="col" >Action</th>  
  </thead>
    <tbody class="text-capitalize">
                @foreach($Demandesenattentedevalidation as $Demande)
                  @if($Demande->Produit_DemandePrestation->count())
                    <tr>
                        <th scope="row" class="font-weight-bold align-middle">{{$Demande->utilisateur->pseudo}}{{$Demande->id}}</th>
                        <td class=" align-middle">{{$Demande->created_at}}</td>
                        <td class=" align-middle">
                            <table class="table table-sm table-bordered"> 
                                @if($Demande->Produit_DemandePrestation->count())
                                    <tr>
                                    <th scope="col">désignation produit</th>
                                    <th scope="col" >QTE demandée</th>
                                    <th scope="col" >QTE Stock</th>
                                    <th scope="col" >QTE prise</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                        @php
                                        $etat_validation=true;
                                        $QPs=array();
                                        @endphp
                                
                                @foreach($Demande->Produit_DemandePrestation as $produit_quantitee)
                                    <tr>
                                        @if($produit_quantitee->produits->designation)
                                            <td>{{$produit_quantitee->produits->designation}}</td>
                                            <td>{{$produit_quantitee->qtedemandee}}</td>
                                            <td>{{$produit_quantitee->produits->qtestock}}</td>
                                            <td>{{$produit_quantitee->qteprise}}</td>
                                            <td> 
                                            

                                                <button type="submit" class="btn btn-warning"data-toggle="modal" data-target="#exampleModalCenter{{$produit_quantitee->id}}">Modifier</button>       
                                                
                                                
                                                <div class="modal fade" id="exampleModalCenter{{$produit_quantitee->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                                                
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modifier QTE prise :</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/qteprisemodi/{{$produit_quantitee->id}}" method="post" >
                                                            @csrf
                                                            @method('PUT')
                                                                <label for="qteprise" class="col-md-4 col-form-label text-md-right">qteprise :</label>
                                                                <div class="col-md-6">
                                                                    <input id="Qteprise" type="text" class="form-control @error('qteprise') is-invalid @enderror" name="Qteprise" value="{{$produit_quantitee->qteprise }}" required autocomplete="qteprise">
                                                                    @error('qteprise')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">
                                                                Enregistrer les modifications
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                
                                                </div>
                                                </div>
                                                </div>
                                            
                                            </td>
                                                    @if($produit_quantitee->qteprise > $produit_quantitee->qtedemandee)
                                                        @php
                                                            $etat_validation=false;
                                                        @endphp
                                                    @endif
                                                    @if($produit_quantitee->qteprise > $produit_quantitee->produits->qtestock)
                                                        @php
                                                            $etat_validation=false;
                                                        @endphp
                                                    @endif
                                                    @php
                                                    $QPs[]=$produit_quantitee->qteprise;
                                                    @endphp
                                        @endif
                                    </tr>
                                @endforeach
                                @endif
                            </table >
                         </td >
                         <td class=" align-middle">
                            @if($etat_validation)
                            <form action="{{route('demandeupdatevalider',$Demande->id)}}" method="POST" class="mr-auto pr-1">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Valider</button>
                            </form>
                            @endif

                          
                         </td>
                    </tr>
                    @endif
                @endforeach

    </tbody>

</table>
@else
<div class="alert alert-success alert-dismissible">Aucune demande à valider...</div>  
@endif