@if ($Demandesrefusees->count())        
    <table class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">
        
        <thead class="table-secondary font-weight-bolder text-capitalize">
            <th scope="col">id</th>
            <th scope="col">date de demande </th>
            <th scope="col">table des produits</th>
        </thead>
                <tbody class="text-capitalize">
                @foreach($Demandesrefusees as $Demande)
                @if($Demande->Produit_DemandePrestation->count())
                    <tr>
                        <th scope="row" class="font-weight-bold align-middle">{{$Demande->id}}</th>
                        <td class=" align-middle">{{$Demande->created_at}}</td>
                        <td >
                        <table class="table table-sm table-bordered"> 
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
                    </tr>
                @endif
                @endforeach
                </tbody>

    </table>
@else
    <div class="alert alert-success alert-dismissible">Aucune demande à afficher...</div>  
@endif 