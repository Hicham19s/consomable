@extends('layouts.app')
@section('content')
<body>
	<div class="container-fluid mt-5 ">
		<div  class="row flex-xl-nowrap mx-auto pt-2 pb-1">





			<div class="col-md-11 col-xl-12 pl-md-1 bd-content ">
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
