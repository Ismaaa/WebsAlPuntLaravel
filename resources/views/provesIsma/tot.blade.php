<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<h1 class="text-center jumbotron">Mini backend de lectura</h1>
		<div class="col-md-2"></div>
		<div class="panel-group col-md-8">

			<div class="panel panel-primary">
			<div class="panel-heading">Totes les receptes</div>
		    	<div class="panel-body">
					<button data-toggle="collapse" data-target="#receptes" class="btn btn-danger">
						Desplega
					</button>
					<div id="receptes" class="collapse">
						<!-- Taula desplegada amb receptes -->	
						<table class="table table-striped table-hover table-responsive">
							<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
									<th>
										Time
									</th>
									<th>
										Diners
									</th>
									<th>
										Directions
									</th>
									<th>
										Img
									</th>
									<th>
										Font
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($receptes as $recepta)
									<tr>
										<td>
											{{ $recepta->id }}
										</td>
										<td>
											{{ $recepta->name }}
										</td>
										<td>
											{{ $recepta->time }}
										</td>
										<td>
											{{ $recepta->diners }}
										</td>
										<td>
											{{ $recepta->directions }}
										</td>
										<td>
											<a href="http://unitedcode.cat/{{ $recepta->img }}">
												<img 
													src="http://unitedcode.cat/{{ $recepta->img }}"
													style="width: 50px; height: 50px" 
												/>
											</a>
										</td>
										<td>
											{{ $recepta->font }}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<hr>
			<div class="panel panel-info">
			<div class="panel-heading">Tots els ingredients</div>
		    	<div class="panel-body">
					<button data-toggle="collapse" data-target="#ingredients" class="btn btn-danger">
						Desplega
					</button>
					<div id="ingredients" class="collapse">
						<!-- Taula desplegada amb ingredients -->	
						<table class="table table-striped table-hover table-responsive">
							<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										Name
									</th>
									<th>
										Plural
									</th>
									<th>
										Alias
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($ingredients as $ingredient)
									<tr>
										<td>
											{{ $ingredient->id }}
										</td>
										<td>
											{{ $ingredient->name }}
										</td>
										<td>
											{{ $ingredient->plural }}
										</td>
										<td>
											{{ $ingredient->alias }}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<hr>
			<div class="panel panel-success">
			<div class="panel-heading">Taula ingredients i receptes</div>
		    	<div class="panel-body">
					<button data-toggle="collapse" data-target="#tot" class="btn btn-danger">
						Desplega
					</button>
					<div id="tot" class="collapse">
						<!-- Taula desplegada amb els ingredients de les receptes -->	
						<table class="table table-striped table-hover table-responsive">
							<thead>
								<tr>
									<th>
										#
									</th>
									<th>
										RecipeID
									</th>
									<th>
										IngredientID
									</th>
									<th>
										Quantity
									</th>
									<th>
										Quantity Units
									</th>
								</tr>
							</thead>
							<tbody>
								@foreach($ingredientsReceptes as $conjunt)
									<tr>
										<td>
											{{ $conjunt->id }}
										</td>
										<td>
											{{ $conjunt->recipeid }}
										</td>
										<td>
											{{ $conjunt->ingredientid }}
										</td>
										<td>
											{{ $conjunt->quantity }}
										</td>
										<td>
											{{ $conjunt->qty_units }}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>					
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>