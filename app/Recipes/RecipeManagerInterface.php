<?php namespace App\Recipes;

/**
 * Created by PhpStorm.
 * User: johnriordan
 * Date: 18/07/2017
 * Time: 21:21
 */

interface RecipeManagerInterface
{
    public function getRecipeById($id);
    public function deleteRecipeById($id);
    public function saveRecipe($data);
    public function updateRecipe($id, $data);
    public function listRecipesByCuisine($cuisine, $page);
    public function submitRating($data);
}