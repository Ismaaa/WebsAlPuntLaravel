@extends('layouts.app')
@section('content')

	<div class="container">
		<div class="container-fluid col-md-12">
			<div class="row col-md-9">
				<div class="card">
					<div class="card-block">
						<h4 class="card-title">
							{{ $recepta->name }}
						</h4>
						<img class="card-img-bottom" src="{{ $recepta->img }}" width="600" height="300">
						<ul>

						</ul>
						<br>
						<ul>
							@foreach($ingredients as $ingredient)
								<span class="glyphicon glyphicon-check" aria-hidden="true" style="color: green;"/></span>
									<span style="color: #3097D1; font-weight: bold;">
									<a href="/buscar?ingredients={{ $ingredient->ingredients->name }}">
										@if($ingredient->qty_units==null)
											@if($ingredient->quantity!=null)
												{{ $ingredient->quantity }}
												- 
											@endif
											@if($ingredient->quantity > 1)
												{{ ($ingredient->ingredients->plural) }}
											@else
												{{ ($ingredient->ingredients->name) }}
											@endif
										@else
											@if($ingredient->quantity!=null)
												{{ $ingredient->quantity }} {{ $ingredient->qty_units }}
												- 
											@endif
											@if($ingredient->ingredients->plural && $ingredient->qty_units!=null)
												{{ ($ingredient->ingredients->plural) }}
											@elseif($ingredient->quantity > 1 && $ingredient->ingredients->plural!=null)
												{{ ($ingredient->ingredients->plural) }}
											@else
												{{ ($ingredient->ingredients->name) }}
											@endif
										@endif
									</a>
								</span>
								<br>
							@endforeach
						</ul>
						<br>
						<p class="card-text">
							{{ $recepta->directions }}
						</p>
						<p class="card-text">
							<small class="text-muted">
								{{ substr($recepta->time, 0, -3) }}
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
			<div class="row col-md-3">
				<h3>També et pot interessar...</h3>
				<div class="card" style="width: 20rem;">
					<img class="card-img-bottom" src="{{ $relacionades->first()->img }}" width="250" height="150">
					<div class="card-block">
						<h4 class="card-title">{{ $relacionades->first()->name }}</h4>
						<p class="card-text">Durada: {{ substr( $relacionades->first()->time, 0, -3) }} h</p>
						<a 
							href="/receptes/{{ $relacionades->first()->id }}" 
							class="btn btn-primary" 
							style="background-color: #34495e;">
								Veure recepta
						</a>
				  </div>
				</div>

			</div>

		</div>

		<div class="col-md-12">
			<h1 class="text-center">Altres receptes</h1>
			<hr>
			@foreach($relacionades as $relacionada)
				@if(!$loop->first)
					<div class="col-md-3">
						<a href="/receptes/{{ $relacionada->id }}">
							<img class="thumbnail" src="{{ $relacionada->img }}" width="250" height="150">
							{{ $relacionada->name }}
						</a>
					</div>
				@endif
			@endforeach
		</div>

	</div>
	<br>
	@include('partials.footer')
@endsection