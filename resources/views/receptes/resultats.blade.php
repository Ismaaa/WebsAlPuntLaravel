@extends('layouts.app')
@section('content')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <div class="col-md-2"></div>
    <div class="panel-group col-md-8">
        <div class="panel panel-primary">
        <div class="panel-heading">Resultats</div>
            <table class="table table-striped table-hover table-responsive">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Ingredient
                        </th>
                        <th>
                            Receptes amb aquest ingredient
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $anterior=null;
                    @endphp

                    @foreach($ingredients as $ingredient)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
                            <td>
                                {{ $ingredient->name }}
                            </td>
                            <td>
                                @foreach($ingredient->receptes as $recepta)
                                    <a href="/receptes/{{ $recepta->recipeid }}">
                                        @php
                                            $noms = App\Recepta::find($recepta->recipeid)
                                            //$recepta->recipeid
                                        @endphp
                                            <label class="label label-primary" style="cursor:pointer">
                                                {{ $noms->name }}
                                            </label>
                                            <br>
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-2"></div>
@endsection

