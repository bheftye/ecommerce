<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public $table = 'food';
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
        'enname', 'svname'
    ];

}
