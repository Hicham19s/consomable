@extends('layouts.app')
@section('content')
<body>
	<div class="container-fluid mt-5 ">
		<div  class="row flex-xl-nowrap mx-auto pt-2 pb-1">
            <div class="col-md-3 col-xl-3 bd-sidebar" style="background-color:#d6d8db;">
                <div class="container">
                    <ul>
                    <li><a href="{{route('demandeslToutes')}}">Historique des livraisons</a></li>
                    <li><a href="">fff</a></li>
                    <li><a href="">ttt</a></li>
                    </ul>  
                </div>
            </div>
            <div>
<div class="col-md-11 col-xl-12 pl-md-1 bd-content ">
				<div class="container ">    
	                     
	                    <div class="col-md-9 justify-content-center">
	                     @if(Session::get('success'))
	                         <div class="alert alert-success alert-dismissible">
	                             <button class="close" data-dismiss="alert">X</button>
	                             {{Session::get('success')}}
	                         </div>
	                    </div>
	                     
	                     @endif
	            </div>
			</div>
		
@if ($DemandesLivraisonNonTraitees->count())     
    <table class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">
        
        <thead class="table-secondary font-weight-bolder text-capitalize">
            <th scope="col">demandeur</th>
            <th scope="col">date de demande </th>
            <th scope="col">table des produits</th>
            <th scope="col" >Action</th> 
        </thead>
                <tbody class="text-capitalize">
                @foreach($DemandesLivraisonNonTraitees as $Demande)
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
                                <th scope="col" >QTE livrée</th>
                                <th scope="col" >option</th>
                                </tr>
                                    
                                @foreach($Demande->Produit_DemandeLivraison as $produit_quantitee)
                                <tr>
                                    @if($produit_quantitee->produits->designation)
                                <td>{{$produit_quantitee->produits->designation}}</td>
                                <td>{{$produit_quantitee->qtedemandee}}</td>
                                <td>{{$produit_quantitee->qtelivrai}}</td>
                                <td>
                            <button type="submit" class="btn btn-warning"data-toggle="modal" 
                            data-target="#modaiModifierQtelivree{{$produit_quantitee->id}}">Modifier</button>       
                                                
                                                
                                                <div class="modal fade" id="modaiModifierQtelivree{{$produit_quantitee->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                                                
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modifier QTE prise :</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('Qttlivreeupdate',$produit_quantitee->id)}}" method="post" >
                                                            @csrf
                                                            @method('PUT')
                                                            
                                                            <div class="select">
                                                                <label class="label d-block">QTE livrée:</label>
                                                                <select style="width: 60px;" name="QteLivree" id="QteLivree">

                                                                    @foreach (range(1,20) as $qte)
                                                                        <option value="{{$qte}}">{{$qte}}</option>    
                                                                    @endforeach
                                                                </select>
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
                                    @endif
                                </tr>
                                @endforeach
                                @endif
                        </table >
                        </td >
                        <td class=" align-middle">
                            <form action="{{route('LivrerDemandeLivraison',$Demande->id)}}" method="POST" class="mr-auto pr-1">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Livrer</button>
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
</div>
</div>
</div>
</body>








@endsection