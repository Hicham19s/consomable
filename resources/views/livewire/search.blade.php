<section>

<div class="container">
    <div class="row pt-2 " style="margin-right: -150px">
        <div class="col-md-10 mx-auto">
        <input type="text" wire:model="query" placeholder="Rechercher par pseudo, nom, prenom..." class="form-control" />
        </div>

    <div class=" pt-2 col-md-12 mx-auto ">
     @if($Utilisateurs->count())
        <table  class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">
          
            <thead class="table-secondary font-weight-bolder text-capitalize">
                <th scope="col">ID</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Service</th>
                <th scope="col">Mot de passe</th>
                <th scope="col">  Action</th> </thead>
                <tbody class="text-capitalize ">
                @foreach($Utilisateurs as $utilisateur)
                        <tr>
                            <th name="id">{{$utilisateur->id}}</th>
                            <td>{{$utilisateur->pseudo}}</td>
                            <td>{{$utilisateur->nom}}</td>
                            <td>{{$utilisateur->prenom}}</td>
                            <td>{{$utilisateur->nomservice}}</td>
                            <td>{{$utilisateur->password}}</td>
                            
                            @if($utilisateur->activation ==1 )
                            <td>
                               <div class="d-flex">
                                   <form action="{{route('utilisateurupdateactivate',$utilisateur->id)}}" method="POST" class="mr-2">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger">desactiver</button>
                                    </form>
                                    <button type="submit" class="btn btn-warning"data-toggle="modal" data-target="#exampleModalCenter{{$utilisateur->id}}">Modifier</button>       
                                                
                                                
                                                <div class="modal fade" id="exampleModalCenter{{$utilisateur->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                                                
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modifier utilisateur :</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/utilisateurs/{{$utilisateur->id}}" method="post" >
                                                        @csrf
                                                        @method('PUT')
                                                            <label id="id" for="id" class="col-md-4 col-form-label text-md-right" name="id">
                                                                    Identifiant :{{$utilisateur->id}}
                                                            </label>
                                                            <div class="form-group row">

                                                                <label for="pseudo" class="col-md-4 col-form-label text-md-right">pseudo :</label>

                                                                <div class="col-md-6">
                                                                    <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{$utilisateur->pseudo }}" required autocomplete="pseudo">

                                                                    @error('pseudo')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="nom" class="col-md-4 col-form-label text-md-right">nom :</label>

                                                                <div class="col-md-6">
                                                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" 
                                                                    value="{{$utilisateur->nom}}" required autocomplete="nom">

                                                                    @error('nom')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="prenom" class="col-md-4 col-form-label text-md-right">prenom :</label>

                                                                <div class="col-md-6">
                                                                    <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{$utilisateur->prenom}}" required autocomplete="prenom">

                                                                    @error('prenom')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form- row ">
                                                                <div class="form-group col-md-6">
                                                                <label for="Service" class="col-md-8 col-form-label text-md-right">Service </label>
                                                                </div>
                                                            <div class="form-group col-md-4">
                                                                <select class="form-control" id="nomservice" name="nomservice">
                                                                    @foreach($TypeServices as $TypeService)
                                                                        @if( $utilisateur->nomservice ==$TypeService)
                                                                            <option selected > {{$TypeService}}</option>
                                                                        @else 
                                                                            <option> {{$TypeService}}</option>
                                                                        @endif
                                                                    @endforeach                                
                                                                </select>
                                                            </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe :</label>

                                                                <div class="col-md-6">
                                                                    <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$utilisateur->password }}" required autocomplete="new-password">

                                                                    @error('password')
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
                            </td>
                        </tr>
                    @else
                            <td>
                                <form action="{{route('utilisateurupdateactivate',$utilisateur->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">activer</button>
                                  <!-- <a class="btn btn-warning" href="{{route('utilisateurShow',$utilisateur->id)}}">
                                        jjjjjj
                                    </a> -->
                                </form>

                            </td>
                    @endif
                @endforeach

                </tbody>
        </table>
        <div class="d-flex justify-content-center">{{$Utilisateurs->links('pagination::bootstrap-4')}} </div>
     @else
     <div class="alert alert-success alert-dismissible">Aucun utilisateur trouvé.</div>
     @endif
    </div>
</div>
</div>
</section>