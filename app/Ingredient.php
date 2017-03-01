<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
	protected $table = 'ingredient';
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'plural', 'alias',
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

    public function ingredientRecepta()
    {
        return $this->hasMany(IngredientsReceptes::class);
    }        
}
