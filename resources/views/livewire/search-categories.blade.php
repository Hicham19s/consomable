<div class="container ">

    <div class="row pt-2" style="margin-right: -150px">
                  <div class="col-md-6 justify-content-center">
                     @if(Session::get('success'))
                         <div class="alert alert-success alert-dismissible">
                             <button class="close" data-dismiss="alert">X</button>
                             {{Session::get('success')}}
                         </div>
					@endif
                    </div>
        <div class="col-md-10 mx-auto">
     
         <input type="text" wire:model="query" placeholder="Rechercher une catégorie..." class="form-control" />
        </div>
        {{$query}}
    <div class=" pt-2 col-md-12 mx-auto  ">
@if ($categories->count())     
    <table class="table table-striped table-hover table-responsive{-sm|-md|-lg|-xl} text-center ">
            <thead class="table-secondary font-weight-bolder text-capitalize">
            <th scope="col" >ID</th>
            <th scope="col">Designation</th>
            <th scope="col">produits associes</th>
            <th scope="col" >Action</th> 
            </thead>
                <tbody class="text-capitalize">
                    @foreach($categories as $categorie)
                    <tr>
                        <th scope="row" class="font-weight-bold align-middle">{{$categorie->id}}</th>
                        <td class=" align-middle">{{$categorie->designation}}</td>
                        <td class=" align-middle">
                        <table class="table table-sm table-bordered"> 
                            @if($categorie->produits->count())
                                <tr>
                                <th scope="col">désignation produit</th>
                                <th scope="col" >QTE Stock</th>
                                </tr>
                                @foreach($categorie->produits as $produit_quantitee)
                                <tr>
                                    @if($produit_quantitee->designation)
                                        <td>{{$produit_quantitee->designation}}</td>
                                        <td>{{$produit_quantitee->qtestock}}</td>
                                    @endif
                                </tr>
                                @endforeach
                            @endif
                        </table >
                        </td >
                        <td>
                        @if (!$categorie->produits->count()) 
                        <div class="d-flex">
                            <form action="{{route('categorieDestoy',$categorie->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button  type="submit" class="btn btn-danger">Spprimer</button>
                    
                            </form>
                            <button type="submit" class="btn btn-warning"data-toggle="modal"
                             data-target="#exampleModalCentermodifier{{$categorie->id}}">Modifier</button>       
                                                
                                                
                                                <div class="modal fade" id="exampleModalCentermodifier{{$categorie->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                                                
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modifier categorie :</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form action="/categories/{{$categorie->id}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group row">
                                                            <label id="id" for="id" class="col-md-4 col-form-label text-md-right" name="id">Identifiant : {{$categorie->id}}</label>
                                                            <label for="id" class="col-md-6 col-form-label text-md-right"></label>
                                                            <label for="designation" class="col-md-4 col-form-label text-md-right">Designation :</label>

                                                            <div class="col-md-6">
                                                                <input  type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{$categorie->designation}}" required autocomplete="email" autofocus>
                                                                @error('designation')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
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
                                                </div>                          
                        @else
                            <button type="submit" class="btn btn-warning"data-toggle="modal"
                             data-target="#exampleModalCentermodifier2{{$categorie->id}}">Modifier</button>       
                                                
                                                
                                                <div class="modal fade" id="exampleModalCentermodifier2{{$categorie->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                                                
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modifier categorie :</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <form  action="/categories/{{$categorie->id}}" method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group row">
                                                            <label id="id" for="id" class="col-md-4 col-form-label text-md-right" name="id">Identifiant : {{$categorie->id}}</label>
                                                            <label for="id" class="col-md-6 col-form-label text-md-right"></label>
                                                            <label for="designation" class="col-md-4 col-form-label text-md-right">Designation :</label>

                                                            <div class="col-md-6">
                                                                <input  type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{$categorie->designation}}" required autocomplete="email" autofocus>
                                                                @error('designation')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
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
                        @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
    </table>

    <div class="d-flex justify-content-center">{{$categories->links('pagination::bootstrap-4')}} </div>
@else
        <div class="alert alert-success alert-dismissible">Aucune categorie trouvée.</div>        
@endif
    </div>
</div>
</div>