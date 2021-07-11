
@extends('layouts.app')

@section('content')

<body>

<div class="container-fluid mt-5">
<div  class="row flex-xl-nowrap mx-auto pt-2 pb-1">
<div class="col-md-3 col-xl-2 bd-sidebar" style="background-color:#d6d8db;">
	<div class="container">
		<div id="html" class="col-md-8 offset-md-4 p-2" style="padding-top: 30px;margin-left: 0px;margin-top: 40px;margin-right: 0;">
			<button data-toggle="modal" data-target="#formulaire" class="btn btn-primary" style="width: 160px;">Créer une categorie</button>
		</div>
		<div class="modal fade" id="formulaire">
				<div class="modal-dialog">
					<div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Créer une nouvelle categorie :</h4>              
                            <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                            </button>
                        </div>
                    <div class="modal-body row">
                     <form action="/categories" method="post" id="submitForm1">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="designation" class="col-md-4 col-form-label text-md-right">Designation :</label>

                            <div class="col-md-6">
                                <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation" placeholder="Saisir une désignation..." autofocus>
                                
                                    <span id="errorform" role="alert">
                                        <strong></strong>
                                    </span>
                              
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" id="savebtn1" class="btn btn-primary"> 
                                            Ajouter Categorie
                                        </button>
                                    </div>
                        </div>
                     </form>
                
                    </div>
					</div>
				</div>
		</div>
	</div>    
    <div style="text-align:center" class=" justify-content-center font-weight-bolder text-capitalize p-2">
        <div class=" p-2">
        <h1><span class="dot">{{$NbrCategories}}  <div class="fontsize1">categories</div></span>
        </h1>
        </div>      
    </div>
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
<div class=" col-md-11 col-xl-8 pl-md-1 bd-content">
            <div class="container">    
                                
                              
                                
                              
                                
                </div>
  
                   
@livewire('search-categories')


 </div>  
</div>
</div>  
@livewireScripts
<script type="text/javascript">

    $(document).on('click', '#savebtn1', function(ev){
		ev.preventDefault();
        var registerForm = $("#submitForm1");
        var formData = registerForm.serialize();
        $.ajax({
            url:'/categories',
            type:'POST',
            data:formData,
            success:function(su) {
                console.log(JSON.stringify(su));
                if(su.success ) {
                    $('#formulaire .close').click();
                }else{
                        $( '#errorform' ).html( "<strong>"+ su.errors[0] +"</strong>");
                   
                }
            },
        });
    });
	

</script>
</body>
@endsection