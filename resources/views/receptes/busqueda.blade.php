<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

<h2 style="text-align: center" class="text-center">Cerca receptes introduïnt els aliments que tens al rebost.</h2>

{{-- <div class="col-md-12 col-lg-12 col-sm-12">
    {!! Form::open(['route' => ['receptes.buscar', Auth::user()], 'method' => 'GET', 'class' => 'field', 'id' => 'searchform']) !!}
    {!! Form::text('ingredients', null, ['id' => 'searchterm','placeholder' => 'oli, tomaquet...']) !!}
    <button type="submit" id="search"><i class="glyphicon glyphicon-search"></i> Buscar</button>
    {!! Form::close() !!}
</div> --}}
<div id="app">
  <multiselect selected-label= "Seleccionat" deselect-label= "Prem enter per eliminar" select-label="Prem enter per seleccionar" placeholder = "Selecciona mes d'un ingredient..." ></multiselect>
</div>

<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
