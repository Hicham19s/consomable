
<div class="container p-4">
    <div class="row ">
        <div class="col-md-10 mx-auto">
        <input type="text" wire:model="query" placeholder="Siasir un pseudo" class="form-control" />
        </div>
    <div class=" p-4 col-md-12 mx-auto ">
        
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
                                <form action="{{route('utilisateurupdateactivate',$utilisateur->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">desactiver</button>
                                    <a class="btn btn-warning" href="{{route('utilisateurShow',$utilisateur->id)}}">
                                        Modifier
                                    </a>
                                </form>

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
    </div>
</div>