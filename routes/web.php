<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/hello', function () use ($app) {
    return 'Hello World';
});

//['middleware' => 'auth']

$app->group(['prefix' => 'api/v1', 'middleware' => 'auth'], function () use ($app)
{
    $app->get('/users', function() use ($app)
    {
        return response()->json(\App\User::all());
    });

    $app->get('/recipe_list/{cuisine}/{page}', 'RecipeController@listRecipesByCuisine');
    $app->get('/recipe', 'RecipeController@recipes');
    $app->get('/recipe/{id}', 'RecipeController@getRecipe');
    $app->post('/recipe', 'RecipeController@saveRecipe');
    $app->put('/recipe/{id}', 'RecipeController@updateRecipe');
    $app->delete('/recipe/{id}', 'RecipeController@deleteRecipe');

    $app->post('/rating', 'RecipeController@rateRecipe');
});