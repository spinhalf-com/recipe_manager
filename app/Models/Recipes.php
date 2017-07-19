<?php namespace App\Models;
/**
 * Created by PhpStorm.
 * User: johnriordan
 * Date: 18/07/2017
 * Time: 22:35
 */

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
    protected $table    =   'recipes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =
    [
        'created_at',
        'updated_at',
        'box_type',
        'title',
        'slug',
        'short_title',
        'marketing_description',
        'calories_kcal',
        'protein_grams',
        'fat_grams',
        'carbs_grams',
        'bulletpoint1',
        'bulletpoint2',
        'bulletpoint3',
        'recipe_diet_type_id',
        'season	base',
        'protein_source',
        'preparation_time_minutes',
        'shelf_life_days',
        'equipment_needed',
        'origin_country',
        'recipe_cuisine',
        'in_your_box',
        'gousto_reference'
    ];

    public $timestamps = true;

    public function ratings()
    {
        return $this->hasMany(\App\Models\Ratings::class);
    }
}
