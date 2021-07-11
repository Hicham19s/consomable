@extends('layouts.app')
@section('content')
<body>
<div class="container-fluid ">
		<div  class="row flex-xl-nowrap mx-auto pt-2 pb-1">

			<div class="col-md-3 col-xl-3 bd-sidebar" style="background-color:#d6d8db;">
		        <div class="container">
		            <ul>
		            <li><a class="btn btn-link" href="{{route('demandespagentnontraitees')}}">Demandes effectuées</a></li>
		            <li><a class="btn btn-link" href="{{route('demandespagenttraitees')}}">Demandes acceptées</a></li>
		            <li><a class="btn btn-link" href="{{route('demandespagenttraitees')}}">Demandes refusées</a></li>
		            <li><a class="btn btn-link" href="{{route('demandespagentnontraitees')}}">Demandes en attente</a></li>
		            <li><a class="btn btn-link" data-toggle="modal"  data-target="#VoirMonProfil">Voir mon profil1</a></li>
		            </ul> 
		        </div>
		    </div>



			<div class="col-md-11 col-xl-9 pl-md-1 bd-content ">
				<div class="container ">    
	                     
	                    <div class="col-md-6 justify-content-center">
	                     @if(Session::get('success'))
	                         <div class="alert alert-success alert-dismissible">
	                             <button class="close" data-dismiss="alert">X</button>
	                             {{Session::get('success')}}
	                         </div>
	                    </div>
	                     
	                     @endif
	            </div>
			</div> 

			@livewire('effectuer-demande')

 
			@livewireScripts
		</div>
	</div>
</body>
@endsection
