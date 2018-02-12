<?php namespace App\Recipes;

/**
 * Created by PhpStorm.
 * User: johnriordan
 * Date: 18/07/2017
 * Time: 21:21
 */

use App\Models\Recipes;
use App\User;
use App\Models\Ratings;
use Illuminate\Support\Facades\Validator;

class RecipeManager implements RecipeManagerInterface
{
    /**
     * GET SINGLE RECIPE RECORD BY ID
     *
     * @param $id
     * @return Eloquent $result | array $errors
     */
    public function getRecipeById($id)
    {
        $rules                      = ['id' => 'required|exists:recipes,id'];

        $data['id']                 = $id;

        $validator                  = Validator::make($data, $rules);

        if($validator->fails())
        {
            abort( 400, $validator->errors());
        }
        else
        {
            $result                 = Recipes::find($id);
        }

        return $result;
    }

    /**
     * DELETE RECIPE RECORD BY ID
     *
     * @param $id
     * @return Eloquent $result | array $errors
     */
    public function deleteRecipeById($id)
    {
        $rules                      = ['id' => 'required|exists:recipes,id'];

        $data['id']                 = $id;

        $validator                  = Validator::make($data, $rules);

        if($validator->fails())
        {
            abort( 400, $validator->errors());
        }
        else
        {
            $recipe                 = $this->getRecipeById($id);

            $result                 = $recipe->delete();
        }

        return $result;
    }

    /**
     * SAVE NEW RECIPE RECORD
     *
     * @param array $data
     * @return Eloquent $result | array $errors
     */
    public function saveRecipe($data)
    {
        if(array_key_exists('title', $data))
        {
            $data['slug']           = strtolower(str_replace(' ', '-', $data['title']));
        }

        $rules                      = [
            'box_type'                  => 'required|in:vegetarian,gourmet',
            'title'	                    => 'required',
            'slug'                      => 'required|unique:recipes,slug',
            'short_title'               => 'sometimes|max:50',
            'marketing_description'     => 'required|min:100,max:1000',
            'calories_kcal'             => 'required|numeric',
            'protein_grams'	            => 'required|numeric',
            'fat_grams'	                => 'required|numeric',
            'carbs_grams'	            => 'required|numeric',
            'bulletpoint1'	            => 'sometimes|max:100',
            'bulletpoint2'	            => 'sometimes|max:100',
            'bulletpoint3'	            => 'sometimes|max:100',
            'recipe_diet_type_id'       => 'required|in:meat,fish,vegetarian',
            'season'                    => 'required',
            'base'	                    => 'sometimes|max:50',
            'protein_source'	        => 'required',
            'preparation_time_minutes'  => 'required|numeric',
            'shelf_life_days'	        => 'required|numeric',
            'equipment_needed'	        => 'required',
            'origin_country'	        => 'required',
            'recipe_cuisine'	        => 'required',
            'gousto_reference'          => 'required|numeric'
        ];

        $validator                      = Validator::make($data, $rules);

        if($validator->fails())
        {
            abort(400, $validator->messages());
        }

        $result                         = Recipes::create($data);

        return $result;
    }

    /**
     * UPDATE RECIPE RECORD
     *
     * @param int $id
     * @param array $data
     * @return Eloquent $result | array $errors
     */
    public function updateRecipe($id, $data)
    {
        $data['id']                     = $id;

        if(array_key_exists('title', $data))
        {
            $data['slug']           = strtolower(str_replace(' ', '-', $data['title']));
        }

        $rules                      = [
            'id'                        => 'required|exists:recipes,id',
            'box_type'                  => 'required|in:vegetarian,gourmet',
            'title'	                    => 'required',
            //'slug'                      => 'required|unique:recipes,slug',
            'short_title'               => 'sometimes|max:50',
            'marketing_description'     => 'required|min:100,max:1000',
            'calories_kcal'             => 'required|numeric',
            'protein_grams'	            => 'required|numeric',
            'fat_grams'	                => 'required|numeric',
            'carbs_grams'	            => 'required|numeric',
            'bulletpoint1'	            => 'sometimes|max:100',
            'bulletpoint2'	            => 'sometimes|max:100',
            'bulletpoint3'	            => 'sometimes|max:100',
            'recipe_diet_type_id'       => 'required|in:meat,fish,vegetarian',
            'season'                    => 'required',
            'base'	                    => 'sometimes|max:50',
            'protein_source'	        => 'required',
            'preparation_time_minutes'  => 'required|numeric',
            'shelf_life_days'	        => 'required|numeric',
            'equipment_needed'	        => 'required',
            'origin_country'	        => 'required',
            'recipe_cuisine'	        => 'required',
            'gousto_reference'          => 'required|numeric'
        ];

        $validator                      = Validator::make($data, $rules);

        if($validator->fails())
        {
            abort(400, $validator->errors());
        }

        $recipe                         = Recipes::find($data['id']);

        foreach ($data as $key => $var)
        {
            $recipe->$key               = $var;
        }

        $recipe->save();

        return $recipe;
    }

    /**
     * LIST COLLECTION OF RECIPES BY CUISINE TYPE
     *
     * @param string $cuisine
     * @param int $page
     * @return Eloquent $result | array $errors
     */
    public function listRecipesByCuisine($cuisine, $page)
    {
        $rules                      = ['recipe_cuisine' => 'required|exists:recipes,recipe_cuisine'];

        $data['recipe_cuisine']     = $cuisine;

        $validator                  = Validator::make($data, $rules);

        if($validator->fails())
        {
            abort(400, $validator->errors());
        }
        else
        {
            $result                 = Recipes::where('recipe_cuisine', $cuisine)->paginate($page);
        }

        return $result;
    }

    /**
     * ALLOW A USER TO RATE A SPECIFIC RECIPE
     *
     * @param array $data
     * @return Eloquent $result | array $errors
     */
    public function submitRating($data)
    {
        $rules                      = [
            'users_id'              => 'required|exists:users,id',
            'recipes_id'            => 'required|exists:recipes,id',
            'rating'                => 'required|between:1,5'
        ];

        $validator                  =  Validator::make($data, $rules);

        if($validator->fails())
        {
            abort(400, $validator->errors());
        }
        else
        {
            $ratingRecord           = Ratings::where('users_id', $data['users_id'])->where('recipes_id', $data['recipes_id'])->first();

            if(count($ratingRecord))
            {
                $ratingRecord->users_id     = $data['users_id'];
                $ratingRecord->recipes_id   = $data['recipes_id'];
                $ratingRecord->rating       = $data['rating'];

                $ratingRecord->save();
            }
            else
            {
                $ratingRecord       = Ratings::create($data);
            }
        }

        return $ratingRecord;
    }
}


