<?php namespace App\Models;
/**
 * Created by PhpStorm.
 * User: johnriordan
 * Date: 19/07/2017
 * Time: 20:35
 */

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    protected $table    =   'ratings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
    [
        'user_id',
        'recipes_id',
        'rating'
    ];

    public $timestamps = false;

    public function recipes()
    {
        return $this->belongsTo(\App\Models\Recipes::class);
    }
}
