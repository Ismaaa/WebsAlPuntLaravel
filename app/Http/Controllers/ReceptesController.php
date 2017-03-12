<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ingredient;
use App\IngredientsReceptes;
use App\Recepta;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

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

    public function vistaVeureRecepta($id)
    {
        //dd($id);
        $recepta = Recepta::find($id);
        $relacionades = Recepta::where('id', '!=', $id)->inRandomOrder()->take(5)->get();;

        if ($recepta && $relacionades) 
        {
            return view('receptes.recepta', compact('recepta', 'relacionades'));
        } 
        else {
            Alert::warning('No s\'ha trobat aquesta recepta, utilitza el nostre buscador :)')->persistent("D'acord!");
            //return redirect()->action('ReceptesController@vistaBuscar');
            return view('welcome');
        }
    }

    public function vistaCrearRecepta()
    {
        $ingredients = Ingredient::pluck('name', 'id'); // Els agafem per nom
        return view('receptes.crear')->with('ingredients', $ingredients);   
    }

    public function afegirRecepta(Request $request)
    {
        //dd($request->ingredients);
        $recepta = new Recepta;

/*
        $recepta->name = $request->name;
        $recepta->time = $request->time;
        $recepta->diners = $request->diners;
        $recepta->directions = $request->directions;
        $recepta->img = $request->img;
        $recepta->font = $request->font;
        */

        $recepta->fill($request->all());

        if($request->hasFile('img'))
        {
            $imatge = $request->file('img');
            $nomfitxer = time() . '.' . $imatge->getClientOriginalExtension();
            Image::make($imatge)->resize(300, 300)->save( public_path('receptes\imatges' . $nomfitxer));
            $recepta->img = $nomfitxer;
        }

        //dd($recepta);
        //dd($request);
        $recepta->save();

        foreach ($request->ingredients as $ingredient) {
            $RecIng = new IngredientsReceptes;
            $RecIng->recipeid = $recepta->id;
            $RecIng->ingredientid = $ingredient;
            $RecIng->save();
        }


        return redirect()->action('ReceptesController@tot');
    }
    
    public function esborrarRecepta($id)
    {
        //dd($id);
        $recepta = Recepta::find($id);
        //dd($recepta);
        $recepta->destroy($id);
        return redirect()->action('ReceptesController@tot');
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

        if($ingredients->isEmpty() || $receptes->isEmpty() || $receptesIngredients->isEmpty())
        {
            Alert::info('No hem trobat cap resultat, torna a provar-ho')->persistent("D'acord!");
            return view('welcome');
        }

        //dd($ingredients);
        //$ingredients = DB::table('ingredient')->where('name', 'like', "%$ingredients}")->get();
        //dd($ingredients); 
        return view('receptes.resultats', compact('ingredients', 'receptes', 'receptesIngredients'));       
    }
}
