<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientsReceptes extends Model
{
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

    public function recepta()
    {
        return $this->hasMany(Recepta::class);
    }

    public function ingredient()
    {
        return $this->hasMany(Ingredient::class);
    }
}
