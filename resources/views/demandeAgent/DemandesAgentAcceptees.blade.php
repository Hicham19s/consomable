@if ($Demandesacceptees->count())        
    <table class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">
        
        <thead class="table-secondary font-weight-bolder text-capitalize">
            <th scope="col">id</th>
            <th scope="col">date de demande </th>
            <th scope="col">table des produits</th>
            <th scope="col" >Action</th> 
        </thead>
                <tbody class="text-capitalize">
                @foreach($Demandesacceptees as $Demande)
                @if($Demande->Produit_DemandePrestation->count())
                    <tr>
                        <th scope="row" class="font-weight-bold align-middle">{{$Demande->id}}</th>
                        <td class=" align-middle">{{$Demande->created_at}}</td>
                        <td >
                        <table class="table table-sm"> 
                            @if($Demande->Produit_DemandePrestation->count())
                                <tr>
                                <th scope="col">désignation produit</th>
                                <th scope="col" >QTE demandée</th>
                                <th scope="col" >QTE à prendre</th>
                                </tr>
                                    
                                @foreach($Demande->Produit_DemandePrestation as $produit_quantitee)
                                <tr>
                                    @if($produit_quantitee->produits->designation)
                                <td>{{$produit_quantitee->produits->designation}}</td>
                                <td>{{$produit_quantitee->qtedemandee}}</td>
                                <td>{{$produit_quantitee->qteprise}}</td>
                                    @endif
                                </tr>
                                @endforeach
                                @endif
                        </table >
                        </td class=" align-middle">
                        <td class="d-flex ">
                            <form action="{{route('demandeupdateactiver',$Demande->id)}}" method="POST" class="mr-auto pr-1">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Accepter</button>
                            </form>
                        
                            <form action="{{route('demandeupdaterefuser',$Demande->id)}}" method="POST" class="mr-auto">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger ">Refuser</button>
                            </form>
                        </td>
                    </tr>
                @endif
                @endforeach
                </tbody>

    </table>
@else
    <div class="alert alert-success alert-dismissible">Aucune demande à afficher...</div>  
@endif 