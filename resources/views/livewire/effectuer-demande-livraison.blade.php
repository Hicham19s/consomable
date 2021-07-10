<div class="pb-2">
    @php
        $controle_button_valider=false;
    @endphp
@if ($DemandeLivraisonEffectuee)   
  
    <table class="table table-striped  table-responsive{-sm|-md|-lg|-xl} text-center ">
        
        <thead class="table-secondary font-weight-bolder text-capitalize">
            <th scope="col">date de demande livraison</th>
            <th scope="col">les produits demandés</th>
        </thead>
            <tbody class="text-capitalize">
                <tr>
                    <td>{{$DemandeLivraisonEffectuee->updated_at}}</td>
                    <td>
                        
                        @if($DemandeLivraisonEffectuee->Produit_DemandeLivraison->count())
                            @php
                                $controle_button_valider=true;
                            @endphp
                        <table class="table table-sm table-bordered">
                            <tr>
                                <th scope="col">produit</th>
                                <th scope="col" >QTE demandée</th>
                                <th scope="col">Action</th>
                            </tr>
                                @foreach ($DemandeLivraisonEffectuee->Produit_DemandeLivraison as $prodiit_livraison)
                                    <tr>
                                        <td>{{$prodiit_livraison->produits->designation}}</td>
                                        <td>{{$prodiit_livraison->qtedemandee}}</td>
                                        <td class="d-flex ">
                                        <button type="submit" class="btn btn-warning mr-2 "data-toggle="modal" 
                            data-target="#modaiModifierQtelivree{{$prodiit_livraison->id}}">Modifier</button>       
                                                
                                                
                                                <div class="modal fade" id="modaiModifierQtelivree{{$prodiit_livraison->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
                                                
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Modifier QTE prise :</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('ModifierQttDemandeeALivrer',$prodiit_livraison->id)}}" method="post" >
                                                            @csrf
                                                            @method('PUT')
                                                            
                                                            <div class="select">
                                                                <label class="label d-block">QTE livrée:</label>
                                                                <select style="width: 60px;" name="QteDemadee" id="QteDemadee">

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
                                            <form action="{{route('supprimerproduitdemandeLivraison',$prodiit_livraison->id)}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-danger  ">Spprimer</button>
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
@endif 
        @if($controle_button_valider)
        <form action="/effectuerdemandelivraison/{{$DemandeLivraisonEffectuee->id}}" method="POST" class="mr-auto pr-1">
            @csrf
            @method('PUT')
                    <button  class="btn btn-success float-right mr-5">Valider la demande</button>   
        </form>
        @else
            <button  class="btn btn-success float-right mr-5 disabled" aria-disabled="true" >Valider la demande</button>
        @endif
    <button data-toggle="modal" data-target="#formulaire" class="btn btn-danger float-left mr-5">Ajouter de produit à la demande de livraison</button>

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
                            @livewire('select-categorie-produit-livraison')

    
                            @livewireScripts
                       </div>
                    </div>
                </div>
        </div>
        
			<button data-toggle="modal" data-target="#nouvellecategorie" class="btn btn-primary pl-2" style="width: 160px;">Créer un produit</button>
		<div class="modal fade" id="nouvellecategorie">
				<div class="modal-dialog">
					<div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Créer une nouveau produit :</h4>              
                            <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                            </button>
                        </div>
                    <div class="modal-body row">
                    <div class="ml-4 d-flex">
                     <form action="/produits" method="post" id="submitForm1">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                        <div class="select ">
                            <label class="label">Catégorie:</label>
                            <select style="width: 115px;" name="CategorieId" id="CategorieId">
                                @foreach ($categories as $categorie)
                                    <option value="{{$categorie->id}}">{{$categorie->designation}}</option>
                                @endforeach
                            </select>
                        </div>
    

                            <div class="col-md-6">
                                <label for="designation" class="">Designation :</label>

                                <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation" placeholder="Saisir une désignation..." autofocus>
                                
                                    <span id="errorform" role="alert">
                                        <strong></strong>
                                    </span>
                              
                            </div>
                            <div class="select">
                                <label class="label">QTE min:</label>
                                <select style="width: 60px;" name="Qtemin" id="Qtemin">

                                    @foreach (range(1,20) as $qte)
                                        <option value="{{$qte}}">{{$qte}}</option>    
                                    @endforeach
                                </select>
                             </div>
                        </div>
                        <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" id="savebtn1" class="btn btn-primary"> 
                                            Ajouter produit
                                        </button>
                                    </div>
                        </div>
                     </form>
                </div>
                    </div>
					</div>
				</div>
		</div>

<!-- <script type="text/javascript">

$(document).on('click', '#savebtn1', function(ev){
    ev.preventDefault();
    var registerForm = $("#submitForm1");
    var formData = registerForm.serialize();
    $.ajax({
        url:'/produits',
        type:'POST',
        data:formData,
        success:function(su) {
            console.log(JSON.stringify(su));
            if(su.success ) {
                $('#formulaire .close').click();
            }else{
                    $( '#errorform' ).html( "<strong>"+ su.errors +"</strong>");
               
            }
        },
    });
});


</script> -->
</div>
