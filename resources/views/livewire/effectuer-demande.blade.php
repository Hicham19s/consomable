<div>
    @php
        $controle_button_valider=false;
    @endphp
@if ($DemandeEffectuee)     
    <table class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">
        
        <thead class="table-secondary font-weight-bolder text-capitalize">
            <th scope="col">date de demande </th>
            <th scope="col">les produits demandés</th>
        </thead>
            <tbody class="text-capitalize">
                <tr>
                    <td>{{$DemandeEffectuee->updated_at}}</td>
                    <td>
                        
                        @if($DemandeEffectuee->Produit_DemandePrestation->count())
                            @php
                                $controle_button_valider=true;
                            @endphp
                        <table class="table table-sm table-bordered">
                            <tr>
                                <th scope="col">produit</th>
                                <th scope="col" >QTE demandée</th>
                                <th scope="col">Action</th>
                            </tr>
                                @foreach ($DemandeEffectuee->Produit_DemandePrestation as $prodiit_prestation)
                                    <tr>
                                        <td>{{$prodiit_prestation->produits->designation}}</td>
                                        <td>{{$prodiit_prestation->qtedemandee}}</td>
                                        <td>
                                            <form action="{{route('supprimerproduitdemande',$prodiit_prestation->id)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger">Spprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                @endforeach
                        </table>
                        @else
                            Aucun produit. 
                        @endif
                        
                        
                    </td>
                </tr>
           </tbody>

    </table>
@else
    <div class="alert alert-success alert-dismissible">Aucune demande à afficher...</div>  

@endif 
        @if($controle_button_valider)
        <form action="{{route('effectuervalidationdemandesagent',$DemandeEffectuee->id)}}" method="POST" class="mr-auto pr-1">
            @csrf
            @method('PUT')
                    <button  class="btn btn-success float-right mr-5">Valider la demande</button>   
        </form>
        @else
            <button  class="btn btn-success float-right mr-5 disabled" aria-disabled="true" >Valider la demande</button>
        @endif
    <button data-toggle="modal" data-target="#formulaire" class="btn btn-danger float-left ml-5">Ajouter de produit à la demande</button>

<div class="modal fade" id="formulaire">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 600px;">
                        <div class="modal-header">
                            <h4 class="modal-title">Seléctionner un produit:</h4>              
                            <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body row">
                        @livewire('select-categorie-produit')

 
                        @livewireScripts
                    </div>
                    </div>
                </div>
        </div>

</div>
