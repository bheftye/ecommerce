<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'r_id', 'f_id', 'quantity'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function food (){
        return $this->belongsTo('App\Food', 'f_id');
    }

    public function recipe (){
        return $this->belongsTo('App\Recipe', 'r_id');
    }
}
