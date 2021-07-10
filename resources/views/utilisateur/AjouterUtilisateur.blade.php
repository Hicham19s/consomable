@extends('layouts.app')
@section('content')
<body> 
  <div class="container p-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Créer un nouveau utilisateur :</div>
                <div class="card-body">
                    <form action="/utilisateurs" method="post" >
                        @csrf
	                        <div class="form-group row">
	                            <label for="pseudo" class="col-md-4 col-form-label text-md-right">pseudo :</label>

	                            <div class="col-md-6">
	                                <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ old('pseudo') }}" required autocomplete="pseudo">

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
	                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom">

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
	                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom">

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

	                                @error('password')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmation du mot de passe :</label>

	                          <div class="col-md-6">
	                                <input id="password-confirm" type="text" class="form-control" name="password_confirmation" required autocomplete="new-password">
	                          </div>
	                        </div>

	                        <div class="form-group row mb-0">
	                            <div class="col-md-6 offset-md-4">
	                                <button type="submit" class="btn btn-primary">
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
</body>
@endsection