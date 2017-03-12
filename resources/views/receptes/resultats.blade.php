@extends('layouts.app')
@include('receptes.busqueda')
<br>
@section('content')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <section>
        <div class="container">
            <div class="row">

                @foreach($ingredients as $ingredient)
                    @foreach($ingredient->receptes as $recepta)
                        @php
                            $noms = App\Recepta::find($recepta->recipeid)
                        @endphp

                        <div class="image-box style-3-b">

                            <div class="row">

                                <div class="col-sm-6 col-md-4">

                                    <div class="overlay-container">
                                        <a href="/receptes/{{ $recepta->recipeid }}"><img width="200px" src="{{$recepta->receptes->img}}"></a>
                                    </div>

                                    <div class="overlay-to-top">

                                        <p class="small margin-clear">
                                            <em>{{ $noms->name }}</em>
                                        </p>

                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-8">

                                    <a href="/receptes/{{ $recepta->recipeid }}"><h1>{{ $noms->name }}</h1></a>
                                    <p>Conté: {{ $ingredient->name }}</p>
                                    <p>{{ substr($recepta->receptes->directions, 0, 100) }}...</p>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach

            </div>
        </div>
    </section>

@endsection
@include('partials.footer')

