<!-- @extends('layouts.app')
@section('content')
<body>
    <div class="container justify-content-center p-5">
        <form action="/categories/{{$categorie->id}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label id="id" for="id" class="col-md-4 col-form-label text-md-right" name="id">Identifiant : {{$categorie->id}}</label>
                <label for="id" class="col-md-6 col-form-label text-md-right"></label>
                <label for="designation" class="col-md-4 col-form-label text-md-right">Designation :</label>

                <div class="col-md-6">
                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{$categorie->designation}}" required autocomplete="email" autofocus>
                    @error('designation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4 p-2">
                            <button type="submit" class="btn btn-primary ml-2">
                                Sauvgarder la modification
                            </button>

                            <a class="btn btn-primary" href="{{route('categories')}}" role="button"  >
                                Annuler
                            </a>
                        </div>
            </div>
        </form>
    </div>  
</body>
@endsection -->