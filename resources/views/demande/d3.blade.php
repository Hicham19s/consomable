@if ($Demandeenattente->count())     
        <table class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">       
                <thead class="table-secondary font-weight-bolder text-capitalize">
                <th scope="col">demandeur</th>
                <th scope="col">date de demande </th>
                <th scope="col">table des produits</th>
                <th scope="col" >Action</th>
            </thead>
               
                    <tbody class="text-capitalize">
                      @foreach($Demandeenattente as $Demande)
                    <tr>
                        <th scope="row" class="font-weight-bold align-middle">{{$Demande->utilisateur->pseudo}}</th>
                        <td class=" align-middle">{{$Demande->created_at}}</td>
                        <td >
                        <table class="table table-sm"> 
                            @if($Demande->Produit_DemandePrestation->count())
                                <tr>
                                <th scope="col">désignation produit</th>
                                <th scope="col" >QTE demandée</th>
                                <th scope="col" >QTE Stock</th>
                                </tr>
                                    
                                @foreach($Demande->Produit_DemandePrestation as $produit_quantitee)
                                <tr>
                                    @if($produit_quantitee->produits->designation)
                                <td>{{$produit_quantitee->produits->designation}}</td>
                                <td>{{$produit_quantitee->qtedemandee}}</td>
                                <td>{{$produit_quantitee->produits->qtestock}}</td>
                                    @endif
                                </tr>
                                @endforeach
                                @endif
                        </table >
                        </td class=" align-middle">
                        <td class="d-flex ">
                            <form action="{{route('demandeupdateabandonner',$Demande->id)}}" method="post">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-danger">Abandonner</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                    </tbody>
               

        </table>
@else
<div class="alert alert-success alert-dismissible">Aucune demande à afficher...</div>  
@endif 
