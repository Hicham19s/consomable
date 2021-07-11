@extends('layouts.app')
@section('content')
<body>
	<div class="container-fluid mt-5 ">
		<div  class="row flex-xl-nowrap mx-auto pt-2 pb-1">
            <div class="col-md-3 col-xl-3 bd-sidebar" style="background-color:#d6d8db;">
                <div class="container">
                <ul>
                    <li><a class="btn btn-link {{url()->current()==route('categories') ? 'font-weight-bolder' :''}}" href="{{route('categories')}}">Categories</a></li>
                    <li><a class="btn btn-link {{url()->current()==route('prevision') ? 'font-weight-bolder' :''}}" href="{{route('prevision')}}">Les previsions trimestrielles</a></li>
                    <li><a class="btn btn-link {{url()->current()==route('demandespToutes') ? 'font-weight-bolder' :''}}" href="{{route('demandespToutes')}}">Historique des demandes de prestations</a></li>
                    <li><a class="btn btn-link {{url()->current()==route('demandeslivDGSI') ? 'font-weight-bolder' :''}}" href="{{route('demandeslivDGSI')}}">Les demandes de livraisons</a></li>
                    <li><a class="btn btn-link {{url()->current()==route('utilisateurs') ? 'font-weight-bolder' :''}}" href="{{route('utilisateurs')}}">Utilisateurs</a></li>
                    <li><a class="btn btn-link" data-toggle="modal"  data-target="#VoirMonProfil">Voir mon profil</a></li>
                </ul>   
                </div>
            </div>




<div>
<div class="col-md-11 col-xl-12 pl-md-1 bd-content ">
        <div class="container ">    
	                     
	                    <div class="col-md-6 justify-content-center">
	                     @if(Session::get('success'))
	                         <div class="alert alert-success alert-dismissible">
	                             <button class="close" data-dismiss="alert">X</button>
	                             {{Session::get('success')}}
	                         </div>
	                    </div>
	                     
	                     @endif
	            </div>
			</div>
		
<div style="height: 347px;width: 968px;overflow-y: auto;">
@if ($DemandesLivraisons->count())     
    <table class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">
        
        <thead class="table-secondary font-weight-bolder text-capitalize">
            <th scope="col">date de demande livraison</th>
            <th scope="col">les produits demandés</th>
            <th scope="col">Action</th>
        </thead>
            <tbody class="text-capitalize">
                @foreach($DemandesLivraisons as $DemandesLivraison)
                <tr>
                    <td>{{$DemandesLivraison->updated_at}}</td>
                    <td>
                        

                        <table class="table table-sm table-bordered">
                            <tr>
                                <th scope="col">produit</th>
                                <th scope="col" >QTE demandée</th>
                                <th scope="col" >QTE livree</th>
                                
                            </tr>
                                @foreach ($DemandesLivraison->Produit_DemandeLivraison as $produit_livraison)
                                    <tr>
                                        <td>{{$produit_livraison->produits->designation}}</td>
                                        <td>{{$produit_livraison->qtedemandee}}</td>
                                        <td>{{$produit_livraison->qtelivrai}}</td>

                                    </tr>
                                    
                                @endforeach
                        </table>
                      
                        
                        
                    </td>
                                        <td>@if($DemandesLivraison->traitement_livraison=='Traitée')
                                            <form action="{{route('DemandeLivraisonRecu',$DemandesLivraison->id)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger">Reçu</button>
                                            </form>
                                            @else
                                            En cours de traitement.
                                            @endif
                                        </td>
                </tr>
                @endforeach
           </tbody>

    </table>
@else
    <div class="col-md-6 justify-content-center pt-3">
            <div class="alert alert-success alert-dismissible">
                Aucune demande de livraison à afficher.
            </div>
    </div>
@endif 
</div>
</div>
		</div>
	</div>
</body>
@endsection
