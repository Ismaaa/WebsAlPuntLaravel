<?php
/**
 * Created by PhpStorm.
 * User: acastells
 * Date: 3/11/17
 * Time: 6:47 PM
 */

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ingredient;
use App\IngredientsReceptes;
use App\Recepta;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Alert;

class IngredientsController extends Controller
{
    public function tot()
    {
        $ingredients = Ingredient::all();
        return json_encode($ingredients);

    }
}