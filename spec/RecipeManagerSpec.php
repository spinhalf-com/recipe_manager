<?php

namespace spec\App\Recipes;

use App\Recipes\RecipeManager;
use PhpSpec\ObjectBehavior;
use PhpSpec\Lumen\LumenObjectBehavior;
use Prophecy\Argument;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class RecipeManagerSpec extends LumenObjectBehavior
{
    use DatabaseTransactions;

    function it_is_initializable()
    {
        $this->restoreDatabase();

        $this->shouldHaveType(RecipeManager::class);
    }

    function it_should_be_an_Eloquent_model()
    {
        $result = $this->getRecipeById(1);
        $result->shouldBeAnInstanceOf(\App\Models\Recipes::class);
    }

    function it_should_throw_http_exception_on_not_found()
    {
        $this->shouldThrow(
            new \Symfony\Component\HttpKernel\Exception\HttpException(
                400,
                '{"id":["The selected id is invalid."]}')
            )->during('getRecipeById', [1000000000]
        );
    }

    function it_should_return_recipe_by_id()
    {
        $result = $this->getRecipeById(1);

        $result->shouldHaveKeyWithValue("title", 'Sweet Chilli and Lime Beef on a Crunchy Fresh');
    }

    function it_should_delete_found_record()
    {
        $result = $this->deleteRecipeById(1);

        //dd($result->getWrappedObject());

        $result->shouldBeBool();
        $result->shouldBeEqualTo(true);

        $this->restoreDatabase();
    }

    function it_should_throw_http_exception_on_failed_delete()
    {
        $this->shouldThrow(
            new \Symfony\Component\HttpKernel\Exception\HttpException(
                400,
                '{"id":["The selected id is invalid."]}')
            )->during('deleteRecipeById', [1000000000]
        );
    }

    function it_should_create_a_new_record_when_valid_data_supplied()
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

        $result             = $this->saveRecipe($recipeArray);
        $result->shouldBeAnInstanceOf(\App\Models\Recipes::class);

        $this->restoreDatabase();
    }

    function it_should_return_an_exception_when_incorrect_data_supplied()
    {
        $recipeArray        = [
            'title'=> "Pesto penne pasta with olive oil and parmesan cheese ",
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
            'gousto_reference'=> 100];
//        $result             = $this->saveRecipe($recipeArray);

        $this->shouldThrow(
            new \Symfony\Component\HttpKernel\Exception\HttpException(
                400,
                '{"box_type":["The box type field is required."]}')
            )->during('saveRecipe', [$recipeArray]
        );
    }

    function restoreDatabase()
    {
        copy(database_path('database_source.sqlite'), database_path('database.sqlite'));
    }
}
