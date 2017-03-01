<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Recepta;
use Illuminate\Http\Request;

class ReceptesController extends Controller
{
    public function prova()
    {
    	$recepta = Recepta::find(2);
    	dd($recepta);
    }
}
