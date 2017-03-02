<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ingredient;
use App\IngredientsReceptes;
use App\Recepta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    	return view('admins.tauler', compact('receptes', 'ingredients', 'ingredientsReceptes'));
    }

    public function vistaBuscar()
    {
        return view('receptes.busqueda');
    }

    public function busqueda(Request $request)
    {
        //dd($request->ingredients);
        $paraules = $request->ingredients;
        //dd($paraules);
        // http://stackoverflow.com/questions/28270244/laravel-search-multiple-words-separated-by-space
        $buscarIngredients = preg_split('/\s+/', $paraules, -1, PREG_SPLIT_NO_EMPTY); 

        //dd($buscarIngredients);
        
        $ingredients = Ingredient::where(function ($q) use ($buscarIngredients) {
          foreach ($buscarIngredients as $ingredient) {
            $q->orWhere('name', 'like', "%{$ingredient}%")
            ->orWhere('plural', 'like', "%{$ingredient}%")
            ->orWhere('alias', 'like', "%{$ingredient}%");
          }
        })->get();

        //dd($ingredients);

        //$receptes = DB::table('recipe')->where('id', '=', $ingredients)->get();
        $receptes = Recepta::all();
        //$asd = collect(json_decode($ingredients))->where('id', 2);
        //dd($asd);
        $receptesIngredients = IngredientsReceptes::all();

        //dd($ingredients);
        //$ingredients = DB::table('ingredient')->where('name', 'like', "%$ingredients}")->get();
        //dd($ingredients); 
        return view('receptes.resultats', compact('ingredients', 'receptes', 'receptesIngredients'));       
    }
}
