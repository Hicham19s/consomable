
@extends('layouts.app')
@section('content')
<body>
<div class="p-5 col-md-12 mx-auto">
@livewire('search')
</div>

</div>

    <div class="container p-2">    
                        <div class="col-md-8 offset-md-4 p-2">
                            <a class="btn btn-primary" href="{{route('utilisateurCreate')}}" role="button"  >
                                Crée un nouveau utilisateur
                            </a>
                        </div>
            <div class="col-md-4 justify-content-center">
            @if(Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button class="close" data-dismiss="alert">X</button>
                    {{Session::get('success')}}
                </div>
            </div>
            
            @endif
    </div> 
 @livewireScripts
</body>
@endsection