@extends('partials/master')
@section('titol') Inici @stop

@section('contingut')
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    {{ Html::linkAction('ReceptesController@prova', 'mostrar receptes') }}
                    {{ Html::linkAction('ReceptesController@tot', 'Mostrar tot') }}
                </div>
            </div>
        </div>
@stop