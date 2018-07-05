<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class RecipeTest extends TestCase
{
    use DatabaseTransactions;

    public function testRecipeListEndpoint()
    {
        $user = factory('App\User')->create();

        $this->actingAs($user)
            ->json('GET', '/api/v1/recipe_list/british/2')
                ->seeJson([
                    "title" => "Umbrian Wild Boar Salami Ragu with Linguine",
                ]
            );
    }

    public function testRecipeByIdEndpoint()
    {
        $user = factory('App\User')->create();

        $this->actingAs($user)
            ->json('GET', '/api/v1/recipe/1')
            ->seeJson([
                "title" => "Sweet Chilli and Lime Beef on a Crunchy Fresh"
                ]
            );
    }

    public function testRecipeCreateEndpoint()
    {
        $recipeArray                = [
            'box_type'=> "vegetarian",
            'title'=> "Pesto penne pasta with olive oil and parmesan cheese",
            'short_title'=> "Penne Pesto",
            'marketing_description'=> "
                In a pan, roast together pomegranate and cumin seeds and grind to a powder.
                Put water, chickpeas, 4 tsp salt, cardamoms, cinnamon and cloves in cooker. Stir.
                Close cooker. Bring to full pressure on high heat. Reduce heat and cook for 18 minutes.
                Remove cooker from heat. Allow to cool naturally.
                Open cooker. Drain off cooking liqu'id' and reserve. Add remaining salt ( 3 ½ tsp), pomegranate-cumin, coriander, pepper, garam masala and mango powders. Mix till chickpeas are coated with spices. Sprinkle chillies and ginger on top.
                In a pan, heat oil and ghee till smoky ( approximately 5 minutes) and pour evenly over chickpeas. Add cooking liqu'id'.
                Place cooker on medium heat. Cook till liqu'id' dries up and oil shows seperately (approximately 10 minutes), stirring occasionally.
                Place chickpeas on serving dish. Serve hot, granished with onion and lemon wedges.",
            'calories_kcal'=> 500,
            'protein_grams'=> 15,
            'fat_grams'=> 10,
            'carbs_grams'=> 20,
            'bulletpoint1'=> "pasta",
            'bulletpoint2'=> "penne",
            'bulletpoint3'=> "pesto",
            'recipe_diet_type_id'=> "vegetarian",
            'season'=> "all",
            'base'=> "pasta",
            'protein_source'=> "bean",
            'preparation_time_minutes'=> 30,
            'shelf_life_days'=> 5,
            'equipment_needed'=> "Appetite, Pasta Drainer",
            'origin_country'=> "Italy",
            'recipe_cuisine'=> "italian",
            'in_your_box'=> null,
            'gousto_reference'=> 100
        ];

        $user = factory('App\User')->create();

        $this->actingAs($user)
            ->json('POST', '/api/v1/recipe', $recipeArray)
            ->seeJson([
                    'slug'=> "pesto-penne-pasta-with-olive-oil-and-parmesan-cheese",
                ]
            );
    }

    public function testRecipeUpdateEndpoint()
    {
        $recipeArray                = [
            'box_type'=> "vegetarian",
            'title'=> "A completely new title",
            'short_title'=> "Penne Pesto",
            'marketing_description'=> "
                In a pan, roast together pomegranate and cumin seeds and grind to a powder.
                Put water, chickpeas, 4 tsp salt, cardamoms, cinnamon and cloves in cooker. Stir.
                Close cooker. Bring to full pressure on high heat. Reduce heat and cook for 18 minutes.
                Remove cooker from heat. Allow to cool naturally.
                Open cooker. Drain off cooking liqu'id' and reserve. Add remaining salt ( 3 ½ tsp), pomegranate-cumin, coriander, pepper, garam masala and mango powders. Mix till chickpeas are coated with spices. Sprinkle chillies and ginger on top.
                In a pan, heat oil and ghee till smoky ( approximately 5 minutes) and pour evenly over chickpeas. Add cooking liqu'id'.
                Place cooker on medium heat. Cook till liqu'id' dries up and oil shows seperately (approximately 10 minutes), stirring occasionally.
                Place chickpeas on serving dish. Serve hot, granished with onion and lemon wedges.",
            'calories_kcal'=> 500,
            'protein_grams'=> 15,
            'fat_grams'=> 10,
            'carbs_grams'=> 20,
            'bulletpoint1'=> "pasta",
            'bulletpoint2'=> "penne",
            'bulletpoint3'=> "pesto",
            'recipe_diet_type_id'=> "vegetarian",
            'season'=> "all",
            'base'=> "pasta",
            'protein_source'=> "bean",
            'preparation_time_minutes'=> 30,
            'shelf_life_days'=> 5,
            'equipment_needed'=> "Appetite, Pasta Drainer",
            'origin_country'=> "Italy",
            'recipe_cuisine'=> "italian",
            'in_your_box'=> null,
            'gousto_reference'=> 100
        ];

        $user = factory('App\User')->create();

        $this->actingAs($user)
            ->json('PUT', '/api/v1/recipe/1', $recipeArray)
            ->seeJson([
                    'slug'=> "a-completely-new-title",
                ]
            );
    }

    public function testDeleteRecipeByIdEndpoint()
    {
        $user = factory('App\User')->create();

        $this->actingAs($user)
            ->json('DELETE', '/api/v1/recipe/1')
            ->seeJson([
                    "status" => true,"data" => "Recipe 1 deleted"
                ]
            );
    }

    public function testRatingEndpoint()
    {
        $user = factory('App\User')->create();

        $res = $this->actingAs($user)
            ->json('POST', '/api/v1/rating', ['rating'=>5 ,'users_id'=>1, 'recipes_id'=>1])
            ->seeJson([
                    "id"=>1,"rating"=>5,"recipes_id"=>1,"users_id"=>$user->id
                ]
            );
    }

}