<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientsReceptes extends Model
{
    public $timestamps = false;
	protected $table = 'recipeingredients';
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'recipeid', 'ingredientid', 'quantity', 'qty_units'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    public function receptes()
    {
        return $this->belongsTo(Recepta::class, 'recipeid');
    }

    public function ingredients()
    {
        return $this->belongsTo(Ingredient::class, 'ingredientid');
    }

}
