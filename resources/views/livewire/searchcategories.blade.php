
<div class="container p-1">
    <div class="row " style="margin-right: -150px">
        <div class="col-md-10 mx-auto">
        <input type="text" wire:model="query" placeholder="Siasir une designation ..." class="form-control" />
        </div>
    <div class=" p-4 col-md-12 mx-auto ">
    @if ($categories->count())     
    <table class="table table-striped table-hover table-responsive{-sm|-md|-lg|-xl} text-center ">
        <caption>Liste des categories.</caption>
            <thead class="table-secondary font-weight-bolder text-capitalize">
            <th scope="col" >ID</th>
            <th scope="col">Designation</th>
            <th scope="col">produits associes</th>
            <th scope="col" >Action</th> </thead>
                <tbody class="text-capitalize">
                @foreach($categories as $categorie)

                    <tr>
                        <th scope="row" class="font-weight-bold">{{$categorie->id}}</th>
                        <td >{{$categorie->designation}}</td>
                        <td >
                         <table class="table table-sm">
                         @if($categorie->produits->count())
                                                <tr>
                                                <th scope="col">Désignation Produit</th>
                                                <th scope="col">Qte Stock</th>
                                                </tr>
                                            
                                            @foreach($categorie->produits as $produitD)
                                            <tr>
                                            @if($produitD->designation)
                                            <td>{{$produitD->designation}}</td>
                                            <td>{{$produitD->qtestock}}</td>
                                            @endif
                                            </tr>
                                            @endforeach
                        @endif              
                        </table>
                        </td>
                        <td>@if (!$categorie->produits->count()) 
                            <form action="/categories/{{$categorie->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Spprimer</button>
                                <a class="btn btn-warning" href="{{route('categorieShow',$categorie->id)}}">
                                    Modifier
                                </a>
                            </form>
                             @else
                            <a class="btn btn-warning" href="{{route('categorieShow',$categorie->id)}}">
                                    Modifier
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            <div > 
            </div> 
    </table>

      @if(!$query)
        <div class="d-flex justify-content-center">{{$categories->links('pagination::bootstrap-4')}} </div>
      @endif    
    @endif    
    @if(!$categories->count())e
        <div class="alert alert-success alert-dismissible">Aucune categorie à afficher...</div>
        
    @endif
    </div>
</div>