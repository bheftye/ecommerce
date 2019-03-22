<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'u_id', 'rname', 'steps', 'img_file', 'calories', 'fat', 'carbohydrate', 'protein', 'sugar', 'vegan', 'link'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    /**
     * Get the user that owns the recipe.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'u_id');
    }

    public function ingredients(){
        return $this->hasMany('App\Ingredient', 'r_id');
    }


}
