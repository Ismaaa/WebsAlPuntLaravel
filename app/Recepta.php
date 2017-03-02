<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recepta extends Model
{
    public $timestamps = false;
	protected $table = 'recipe';
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'time', 'diners', 'directions', 'img', 'font'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];

    public function ingredients()
    {
        return $this->hasMany(IngredientsReceptes::class, 'ingredientid');
    }
}
