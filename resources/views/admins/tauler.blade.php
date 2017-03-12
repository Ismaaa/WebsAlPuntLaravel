@extends('layouts.app')

@section('content')
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
                                    <th>
                                        Esborrar
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
                                            <a href="{{ $recepta->img }}">
                                                <img 
                                                    src="{{ $recepta->img }}"
                                                    style="width: 50px; height: 50px" 
                                                />
                                            </a>
                                        </td>
                                        <td>
                                            {{ $recepta->font }}
                                        </td>
                                        <td>
                                            <a href="{{ url('gestio/receptes/esborrar', [ $recepta->id ]) }}">
                                            <button class="btn btn-danger">
                                                Esborrar
                                            </button>
                                            
                                            </a>
                                        

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
@endsection
