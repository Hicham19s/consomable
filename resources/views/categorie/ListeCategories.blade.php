
@extends('layouts.app')

@section('content')

<body>
<div class="container-fluid ">
<div  class="row flex-xl-nowrap mx-auto pt-1 pb-1">
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
                     <form action="" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="designation" class="col-md-4 col-form-label text-md-right">Designation :</label>

                            <div class="col-md-6">
                                <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation" placeholder="Saisir une désignation..." autofocus>
                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary"> 
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
        <h1><span class="dot">{{$categories->count()}}  <div class="fontsize1">categories</div></span>
        </h1>
        </div>      
    </div>
</div>
<div class=" col-md-11 col-xl-8 pl-md-1 bd-content">
            <div class="container">    
                                
                                <div class="col-md-4 justify-content-center">
                                @if(Session::get('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button class="close" data-dismiss="alert">X</button>
                                        {{Session::get('success')}}
                                    </div>
                                </div>
                                
                                @endif
                </div>
  

@livewire('search-categories')


 </div>  
</div>
</div>  
@livewireScripts

</body>
@endsection