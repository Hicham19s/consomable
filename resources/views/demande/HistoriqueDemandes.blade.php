@extends('layouts.app')
@section('content')
<body>
<div class="container-fluid ">
@if ($ToutesDemandes->count())     
                    <table class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">
                        
                        <thead class="table-secondary font-weight-bolder text-capitalize">
                            <th scope="col" >ID</th>
                            <th scope="col">demandeur</th>
                            <th scope="col">date de demande </th>
                            <th scope="col">Table des produits</th>
                            <th scope="col" >état</th> 
                        </thead>
                           
                                <tbody class="text-capitalize">
                                  @foreach($ToutesDemandes as $Demande)
                    <tr>
                        <th scope="row" class="font-weight-bold align-middle">{{$Demande->id}}</th>
                        <td class=" align-middle">{{$Demande->utilisateur->pseudo}}</td>
                        <td class=" align-middle">{{$Demande->created_at}}</td>
                        <td >
                        <table class="table table-sm table-bordered"> 
                            @if($Demande->Produit_DemandePrestation->count())
                                <tr>
                                <th scope="col">désignation produit</th>
                                <th scope="col" >QTE demandée</th>
                                <th scope="col" >QTE prise</th>
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
                        <td class="align-middle">{{$Demande->etat_traitement}}</td>
                    </tr>
                @endforeach
                
                                </tbody>
                           

                    </table>
<div class="d-flex justify-content-center">{{$ToutesDemandes->links('pagination::default')}} </div>

              @else
                <div class="alert alert-success alert-dismissible">Aucune demande à afficher...</div>  
              @endif 

</div>
</body>
@endsection