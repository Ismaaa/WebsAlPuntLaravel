<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ingredient;
use App\IngredientsReceptes;
use App\Recepta;
use Illuminate\Http\Request;

class ReceptesController extends Controller
{
    public function prova()
    {
    	$recepta = Recepta::all();
    	dd($recepta);
    }
    public function tot()
    {
    	$receptes = Recepta::all();
    	$ingredients = Ingredient::all();
    	$ingredientsReceptes = IngredientsReceptes::all();

    	return view('provesIsma.tot', compact('receptes', 'ingredients', 'ingredientsReceptes'));
    }
}
