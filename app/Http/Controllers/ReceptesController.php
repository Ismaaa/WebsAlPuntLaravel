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
        $ingredients = IngredientsReceptes::where('recipeid', '=', $id)->get();
        //$ingredients = DB::table('recipeingredients')->where('recipeid', '=', $id)->get();
        //$users = DB::table('users')->where('votes', '=', 100)->get();
        //dd($ingredients);

        $relacionades = Recepta::where('id', '!=', $id)->inRandomOrder()->take(5)->get();;

        if ($recepta && $relacionades) 
        {
            return view('receptes.recepta', compact('recepta', 'relacionades', 'ingredients'));
        } 
        else {
            Alert::warning('No s\'ha trobat aquesta recepta, utilitza el nostre buscador :)')->persistent("D'acord!");
            //return redirect()->action('ReceptesController@vistaBuscar');
            return redirect('/');
        }
    }

    public function vistaCrearRecepta()
    {
        $ingredients = Ingredient::pluck('name', 'id'); // Els agafem per nom
        return view('receptes.crear')->with('ingredients', $ingredients);   
    }

    public function afegirRecepta(Request $request)
    {
        //dd($request);
        //dd($request->ingredients);
        $recepta = new Recepta;
        $quantitat = explode(" ",$request->quantitat);
        $unitats = explode(" ",$request->unitat);
        //dd($quantitat);
/*
        $recepta->name = $request->name;
        $recepta->time = $request->time;
        $recepta->diners = $request->diners;
        $recepta->directions = $request->directions;
        $recepta->img = $request->img;
        $recepta->font = $request->font;
        */
       
        $recepta->fill($request->all());

        /*
        if($request->hasFile('img'))
        {
            $imatge = $request->file('img');
            $nomfitxer = time() . '.' . $imatge->getClientOriginalExtension();
            Image::make($imatge)->resize(300, 300)->save( public_path('receptes\imatges' . $nomfitxer));
            $recepta->img = $nomfitxer;
        }*/

        //dd($recepta);
        //dd($request);
        $recepta->save();

        $pos=0;
        foreach ($request->ingredients as $ingredient) {
            $RecIng = new IngredientsReceptes;
            $RecIng->recipeid = $recepta->id;
            $RecIng->ingredientid = $ingredient;
            $RecIng->quantity = $quantitat[$pos];
            $RecIng->qty_units = $unitats[$pos];
            $RecIng->save();
            $pos++;
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
        if(!$request->ingredients)
        {
            Alert::info('No has introduït cap ingredient, introdueix-ne un al menys :)')->persistent("D'acord!");
            return redirect('/');
        }        
        //dd($request->ingredients);
        $paraules = $request->ingredients;
        //dd($paraules);
        // http://stackoverflow.com/questions/28270244/laravel-search-multiple-words-separated-by-space
        $buscarIngredients = preg_split('/\s+/', $paraules, -1, PREG_SPLIT_NO_EMPTY); 

        //dd($buscarIngredients);
        
        $ingredients = Ingredient::where(function ($q) use ($buscarIngredients) {
          foreach ($buscarIngredients as $ingredient) {
            $q->orWhere('name', '=', "$ingredient")/*
            ->orWhere('plural', 'like', "%{$ingredient}%")
            ->orWhere('alias', 'like', "%{$ingredient}%")*/;
          }
        })->get();

        //dd($ingredients);

        //$receptes = DB::table('recipe')->where('id', '=', $ingredients)->get();
        $receptes = Recepta::all();
        //$asd = collect(json_decode($ingredients))->where('id', 2);
        //dd($asd);
        $receptesIngredients = IngredientsReceptes::all();

        if($ingredients->count()==0)
        {
            Alert::info('No hem trobat cap resultat, torna a provar-ho')->persistent("D'acord!");
            return redirect('/');
        }

        //dd($ingredients);
        //$ingredients = DB::table('ingredient')->where('name', 'like', "%$ingredients}")->get();
        //dd($ingredients); 
        return view('receptes.resultats', compact('ingredients', 'receptes', 'receptesIngredients'));       
    }
}
