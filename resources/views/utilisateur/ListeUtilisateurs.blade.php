
@extends('layouts.app')
@section('content')
<body>
<div class="container-fluid mt-5 ">
<div  class="row flex-xl-nowrap mx-auto pt-2 pb-1">

<div class="col-md-3 col-xl-2 bd-sidebar" style="background-color:#d6d8db;">
<div class="container">
      <div id="html" class="col-md-8 offset-md-4 p-2" style="padding-top: 30px;margin-left: 0px;margin-top: 40px;margin-right: 0;">
          <button data-toggle="modal" data-target="#formulaire" 
		  class="btn btn-primary" style="width: 160px;">Créer un utilisateur</button>
      </div>
    <div class="modal fade" id="formulaire">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Créer un nouvel utilisateur :</h4>              
              <button type="button" class="close" data-dismiss="modal">
                       <span>&times;</span>
              </button>
          </div>
          <div class="modal-body row">
                      <div>
                        <span class="col-5" style="color: red" id="errorform"  role="alert">
                        </span>
                      </div>
                 <form action="/utilisateurs" method="post" id="submitForm" >
                        @csrf
                        @method('POST')
	                        <div class="form-group row">
	                            <label for="pseudo" class="col-md-4 col-form-label text-md-right">pseudo :</label>

	                            <div class="col-md-6">
	                                <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ old('pseudo') }}" required autocomplete="pseudo">
	                                    <!-- <span id="errorform"  role="alert">
	                                    </span> -->
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="nom" class="col-md-4 col-form-label text-md-right">nom :</label>

	                            <div class="col-md-6">
	                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom">

	                               
	                                    <!-- <span id="errorform1"  role="alert">
	                                    </span> -->
	                               
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label for="prenom" class="col-md-4 col-form-label text-md-right">prenom :</label>

	                            <div class="col-md-6">
	                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom">

	                                    <!-- <span id="errorform2"  role="alert">
	                                    </span> -->
	                              
	                            </div>
	                        </div>
	                        <div class="form- row ">
	                            <div class="form-group col-md-6">
	                              <label for="Service" class="col-md-8 col-form-label text-md-right">Service </label>
	                            </div>
	                        @if ($TypeServices)  
	                           <div class="form-group col-md-4">
	                              <select class="form-control" id="nomservice" name="nomservice">
	                              	@foreach($TypeServices as $TypeService)
		                    			<option >{{$TypeService}}</option>
		                    		@endforeach                                
	                              </select>
	                           </div>
	                        @endif
	                        </div>
	                        <div class="form-group row">
	                            <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe :</label>

	                            <div class="col-md-6">
	                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

	                                    <!-- <span id="errorform3"  role="alert">
	                                    </span> -->
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmation du mot de passe :</label>

	                          <div class="col-md-6">
	                                <input id="password-confirm" type="text" class="form-control" name="password_confirmation" required autocomplete="new-password">
	                          </div>
	                        </div>

	                        <div class="form-group row mb-0 ">
	                            <div class="col-md-6 offset-md-4">
	                                <button type="submit" id="savebtn" class="btn btn-primary">
	                                    Enregistrer
	                                </button>
	                                <a class="btn btn-primary" href="{{route('utilisateurs')}}" role="button">Annuler</a>
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
        <h1><span class="dot">{{$nbrutilisateurs}}  <div class="fontsize1">utilisateurs</div></span>
        </h1>
        </div>
        <div  class=" p-2">
         
        <h1><span class="dotactif">{{$nbrutilisateursactifs}} <div class="fontsize1">actif</div></span>
        </h1>
        </div>
        <div  class=" p-2">
         
        <h1><span class="dotdesactif">{{$nbrutilisateursdesactifs}} <div class="fontsize1">anactif</div></span>
        </h1>
        </div>
    </div>            

</div>


<div class="col-md-11 col-xl-8 pl-md-1 bd-content ">
<div class="container ">    
                     

                     
                     
             </div> 
@livewire('search')
</div>

</div>

   
<!-- Modal Example Start-->

 @livewireScripts
 </div>
</div>

<script type="text/javascript">

    $(document).on('click', '#savebtn', function(ev){
		ev.preventDefault();
        var registerForm = $("#submitForm");
        var formData = registerForm.serialize();
        $.ajax({
            url:'/utilisateurs',
            type:'POST',
            data:formData,
            success:function(su) {
                console.log(JSON.stringify(su));
                if(su.success ) {
                    $('#formulaire .close').click();
                }else{
					
                    if(su.errors[0]){
                        $( '#errorform' ).html( "<strong>"+ su.errors[0] +"</strong>");
                    }
                    if(su.errors[1]){
                        $( '#errorform' ).html( "<strong>"+ su.errors[1] +"</strong>");
                    }
					if(su.errors[2]){
                        $( '#errorform' ).html( "<strong>"+su.errors[2] +"</strong>" );
                    }
                    if(su.errors[3]){
                        $( '#errorform' ).html("<strong>"+ su.errors[3] +"</strong>" );
                    }
                    
                }
            },
        });
    });
	

</script>

</body>


@endsection
