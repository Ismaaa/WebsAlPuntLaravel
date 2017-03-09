@extends('layouts.app')
@section('content')
	<div class="container-fluid col-md-12">
		<div class="row col-md-2">
			
		</div>
		<div class="row col-md-8">
			<div class="card">
			  	<div class="card-block">
					<h4 class="card-title">
						{{ $recepta->name }}
					</h4>			  	
					<img class="card-img-bottom" src="http://placehold.it/600x300" width="600" height="300">
					<p class="card-text">
						{{ $recepta->directions }}
					</p>
					<p class="card-text">
						<small class="text-muted">
							Temps {{ $recepta->time }}
						</small>
					</p>
					<p class="card-text">
						{{ $recepta->dinners }}
					</p>
					<p class="card-text">
						{{ $recepta->font }}
					</p>
				</div>
			</div>
		</div>
		<div class="row col-md-2">
			<h3>També et pot interessar...</h3>
			<div class="card" style="width: 20rem;">
				<img class="card-img-bottom" src="http://placehold.it/250x150" width="250" height="150">
				<div class="card-block">
			    	<h4 class="card-title">{{ $relacionades->first()->name }}</h4>
			    	<p class="card-text">Durada: {{ $relacionades->first()->time }}</p>
			    	<a href="/gestio/receptes/{{ $relacionades->first()->id }}" class="btn btn-primary">Veure recepta</a>
			  </div>
			</div>
		</div>

	</div>
	<h1 class="text-center">Altres receptes</h1>
	<hr>
	<div class="row col-md-1">
		
	</div>
	@foreach($relacionades as $relacionada)
		<div class="row col-md-3">
			<a href="/gestio/receptes/{{ $relacionada->id }}">
				<img class="thumbnail" src="http://placehold.it/250x150" width="250" height="150">
		    		{{ $relacionada->name }}
	    	</a>
		</div>
	@endforeach

	<div class="jumbotron col-md-12 text-center">
		<h1>
			Aquí el peu
		</h1>
	</div>
@endsection