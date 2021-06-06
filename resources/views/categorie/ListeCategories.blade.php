
@extends('layouts.app')

@section('content')

<body>



    <div class="container p-2">
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
            <div class="col-md-4 justify-content-center">
            @if(Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button class="close" data-dismiss="alert">X</button>
                    {{Session::get('success')}}
                </div>
            @endif
            </div>
        </form>
        
    </div>
 <div class="container p-1 vertical-scrollable">
    @if ($categories->count())     
    <table class="table table-info table-hover table-responsive{-sm|-md|-lg|-xl} text-center ">
        <caption>Liste des categories:./caption>
            <thead class="table-secondary font-weight-bolder text-capitalize"><th scope="col" >
            ID</th><th scope="col">Designation</th><th scope="col" >Action</th> </thead>
            @foreach($categories as $categorie)
                <tbody class="text-capitalize">
                    <tr>
                        <th scope="row" class="font-weight-bold">{{$categorie->id}}</th>
                        <td >{{$categorie->designation}}</td>
                        <td>
                            <form action="/categories/{{$categorie->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Spprimer</button>
                                <a class="btn btn-warning" href="{{route('categorieShow',$categorie->id)}}">
                                    Modifier
                                </a>
                            </form>

                        </td>
                    </tr>
                </tbody>
            <div > 
            </div> 
            @endforeach
    </table>
    <div class="d-flex justify-content-center">{{$categories->links('pagination::bootstrap-4')}} </div>
    @else
        <div class="alert alert-success alert-dismissible">Aucune categorie à afficher...</div>
        
    @endif
 </div>    
</body>
@endsection