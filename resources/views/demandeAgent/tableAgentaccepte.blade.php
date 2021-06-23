@if ($Demandeseffectuees->count())     
    <table class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">
        
        <thead class="table-secondary font-weight-bolder text-capitalize">
            <th scope="col" >ID</th>
            <th scope="col">produit</th>
            <th scope="col">quantité</th>
            <th scope="col">date</th>
            <th scope="col">utilisateur</th>
            <th scope="col" >Action</th> 
        </thead>
                <tbody class="text-capitalize">
                @foreach($Demandeseffectuees as $Demande)
                    <tr>
                        <th scope="row" class="font-weight-bold">{{$Demande->id}}</th>
                        <td >{{$Demande->produit->designation}}</td>
                        <td >{{$Demande->qtedemandee}}</td>
                        <td >{{$Demande->created_at}}</td>
                        <td >{{$Demande->utilisateur->pseudo}}</td>
                        <td class="d-flex ">
                            <!-- <form action="{{route('demandeupdateactiver',$Demande->id)}}" method="POST" class="mr-auto">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Accepter</button>
                            </form>
                            <form action="{{route('demandeupdaterefuser',$Demande->id)}}" method="POST" class="mr-auto">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger ">Refuser</button>
                            </form> -->
                        </td>
                    </tr>
                @endforeach
                </tbody>

    </table>
@else
    <div class="alert alert-success alert-dismissible">Aucune demande à afficher...</div>  
@endif 