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
<h2>Les produits plus demandes: </h2>

@if ($ProduitsPlusDemandes->count())     
    <table class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">
        
        <thead class="table-secondary font-weight-bolder text-capitalize">
            <th scope="col">designation</th>
            <th scope="col">Qte Stock</th>
            <th scope="col">Qte MIn</th>
            <th scope="col">Action</th>
        </thead>
            <tbody class="text-capitalize">
                @foreach($ProduitsPlusDemandes as $Produit)
                <tr>
                    <td>{{$Produit->designation}}</td>
                    <td>{{$Produit->qtestock}}</td>
                    <td>{{$Produit->qtemin}}</td>
                    <td>    
                        <form action="/ajouterproduitdemandelivraisonprevision/{{$Produit->id}}" method="POST" class="d-flex">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-link">Ajouter à la demande du livraison</button>
                        </form>
                    </td>
                </tr>
                @endforeach
           </tbody>

    </table>

@else
    <div class="col-md-6 justify-content-center pt-3">
            <div class="alert alert-success alert-dismissible">
                Aucun prduit atteint sa Qte Min.
            </div>
    </div>
@endif 
<div class="divider py-1 bg-dark"></div>


<h2>Les produits atteint une QTE minimale: </h2>

@if ($ProduitsQteMin->count())     
    <table class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">
        
        <thead class="table-secondary font-weight-bolder text-capitalize">
            <th scope="col">designation</th>
            <th scope="col">Qte Stock</th>
            <th scope="col">Qte MIn</th>
            <th scope="col">Action</th>
        </thead>
            <tbody class="text-capitalize">
                @foreach($ProduitsQteMin as $Produit)
                <tr>
                    <td>{{$Produit->designation}}</td>
                    <td>{{$Produit->qtestock}}</td>
                    <td>{{$Produit->qtemin}}</td>
                    <td>    
                        <form action="/ajouterproduitdemandelivraisonprevision/{{$Produit->id}}" method="POST" class="d-flex">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-link">Ajouter à la demande du livraison</button>
                        </form>
                    </td>
                </tr>
                @endforeach
           </tbody>

    </table>
    <div class="d-flex justify-content-center">{{$ProduitsQteMin->links('pagination::default')}} </div>

@else
    <div class="col-md-6 justify-content-center pt-3">
            <div class="alert alert-success alert-dismissible">
                Aucun prduit atteint sa Qte Min.
            </div>
    </div>
@endif 
</div>
</div>
		</div>
	</div>
</body>
@endsection
