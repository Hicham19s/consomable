@extends('layouts.app')
@section('content')
<body>
<div class="container-fluid mt-5 ">
		
@if ($DemandesLivraisonNonToutes->count())     
    <table class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">
        
        <thead class="table-secondary font-weight-bolder text-capitalize">
            <th scope="col">demandeur</th>
            <th scope="col">date de demande </th>
            <th scope="col">table des produits</th>
            <th scope="col" >etat</th> 
        </thead>
                <tbody class="text-capitalize">
                @foreach($DemandesLivraisonNonToutes as $Demande)
                @if($Demande->Produit_DemandeLivraison->count())
                    <tr>
                        <th scope="row" class="font-weight-bold align-middle">{{$Demande->utilisateur->pseudo}}</th>
                        <td class=" align-middle">{{$Demande->created_at}}</td>
                        <td >
                        <table class="table table-sm table-bordered"> 
                            @if($Demande->Produit_DemandeLivraison->count())
                                <tr>
                                <th scope="col">désignation produit</th>
                                <th scope="col" >QTE demandée</th>
                                <th scope="col" >QTE Stock</th>
                                </tr>
                                    
                                @foreach($Demande->Produit_DemandeLivraison as $produit_quantitee)
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
                        <td class=" align-middle">{{$Demande->traitement_livraison}}</td>

                    </tr>
                @endif
                @endforeach
                </tbody>

    </table>
    <div class="d-flex justify-content-center">{{$DemandesLivraisonNonToutes->links('pagination::default')}} </div>

@else
    <div class="alert alert-success alert-dismissible">Aucune demande à afficher...</div>  
@endif 
</div>

</body>
@endsection