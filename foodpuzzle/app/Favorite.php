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

    /**
     * @param $r_id
     * @param $u_id
     * @return bool true or false
     */
    public static function isFavorite ($r_id, $u_id){
        $favorite = self::where(['r_id' => $r_id, 'u_id' => $u_id])->first();
        return !empty($favorite);
    }
}
