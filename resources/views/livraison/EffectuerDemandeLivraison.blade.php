@extends('layouts.app')
@section('content')
<body>
	<div class="container mt-5 ">
  
	                     
	                     @if(Session::get('success'))
	                         <div class="alert alert-success alert-dismissible">
	                             <button class="close" data-dismiss="alert">X</button>
	                             {{Session::get('success')}}
	                         </div>
	                   
	                     
	                     @endif
	        
            
            @livewire('effectuer-demande-livraison')

 
            @livewireScripts
	</div>
</body>
@endsection
