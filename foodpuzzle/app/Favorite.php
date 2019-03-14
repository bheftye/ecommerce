<?php
/**
 * Created by PhpStorm.
 * User: bheftye
 * Date: 3/14/19
 * Time: 14:30
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'u_id', 'r_id'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * This is the favorite recipe
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo('App\Recipe', 'r_id');
    }

    /**
     * This is the user that likes this recipe.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'u_id');
    }

}