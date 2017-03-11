@extends('layouts.app')

@section('content')
        <h1 class="text-center jumbotron">Afegir receptes</h1>
        <div class="col-md-2"></div>
        <div class="panel-group col-md-8">

            <div class="panel panel-primary">
            <div class="panel-heading">Afegir una recepta</div>
                <div class="panel-body">
                	

            <div class="panel-heading">Emplena tots els camps, tots són obligatoris</div>
                <div class="panel-body">
                    {!! Form::open(['url' => '/gestio/receptes/afegir', 'files' => true, 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <div class="form-group">
                            {!! Form::label('name', 'Nom', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('name', null, ['class' => 'form-control','placeholder' => 'Patates amb conill', 'required']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            {!! Form::label('time', 'Time', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('time', null, ['class' => 'form-control','placeholder' => '30:00', 'required']) !!}
                            </div>
                        </div>
                    </div>   

                    <div class="form-group">
                        <div class="form-group">
                            {!! Form::label('diners', 'Diners', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::number('diners', null, ['class' => 'form-control','placeholder' => '3']) !!}
                            </div>
                        </div>
                    </div>                      

                    <div class="form-group">
                        <div class="form-group">
                            {!! Form::label('directions', 'Directions', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::textarea('directions', null, ['class' => 'form-control','placeholder' => 'Primer agafem el conill...', 'required']) !!}
                            </div>
                        </div>
                    </div>   


                    <div class="form-group">
                        <div class="form-group">
                            {!! Form::label('img', 'Img', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                               {!! Form::text('img', null, ['class' => 'form-control', 'placeholder' => 'www.wikipedia.com/images/hola.png']) !!}
                            </div>
                        </div>
                    </div>    


                    <div class="form-group">
                        <div class="form-group">
                            {!! Form::label('font', 'Font', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                {!! Form::text('font', null, ['class' => 'form-control','placeholder' => 'http://wikipedia.com/....', 'required']) !!}
                            </div>
                        </div>
                    </div>

                    <!-- Ingredients -->
                        <div class="form-group">
                            <div class="form-group">

                                {!! Form::label('ingredients', 'Ingredients', ['class' => 'col-md-4 control-label']) !!}

                                <div class="col-md-6">

                                    {!! Form::select('ingredients[]', $ingredients, $ingredients
                                        ->pluck('id')
                                        ->all(), ['id' => 'ingredient', 'multiple' => 'multiple', 'class' => 'form-control', 'size' => '10']) !!}
                                </div>

                            </div>
                        </div>     

                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label('quantitat', 'Quantitat **Ordenats segons has ingredients de dalt', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {{ Form::text('quantitat', null) }}
                                </div>
                            </div>
                        </div>         

                        <div class="form-group">
                            <div class="form-group">
                                {!! Form::label('unitats', 'Unitats **Ordenats segons has ingredients de dalt - gr, ml, unitats', ['class' => 'col-md-4 control-label']) !!}
                                <div class="col-md-6">
                                    {{ Form::text('unitat', null) }}
                                </div>
                            </div>
                        </div>   
                        

                        <div class="form-group">
                            <div class="col-md-6">
                                {!! Form::submit('Desar', ['class' => 'btn btn-primary']) !!}
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>

                </div>
            </div>
           
        <div class="col-md-2"></div>
@endsection
