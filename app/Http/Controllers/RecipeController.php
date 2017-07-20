<?php namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: johnriordan
 * Date: 18/07/2017
 * Time: 22:21
 */

use App\Recipes\RecipeManagerInterface;
use Illuminate\Http\Request;
use App\Models\Recipes;
use App\User;

class RecipeController extends Controller
{
    /**
     * Inject $recipeManager dependency
     *
     * @var RecipeManagerInterface
     */
    public $recipeManager;

    /**
     * Inject $request
     *
     * @var Request
     */
    public $request;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request, RecipeManagerInterface $recipeManager)
    {
        $this->recipeManager            = $recipeManager;
        $this->request                  = $request;
    }

    /**
     * List recipes by cuisine - paginated
     *
     * @param string $cuisine
     * @return \Illuminate\Http\JsonResponse
     */
    public function listRecipesByCuisine($cuisine, $page = 3)
    {
        $result                         = $this->recipeManager->listRecipesByCuisine($cuisine, $page);

        return response()->json($result, 200);
    }

    /**
     * Get recipe by ID
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRecipe($id)
    {
        $result                         = $this->recipeManager->getRecipeById($id);

        return response()->json($result, 200);
    }

    /**
     * Save new recipe
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveRecipe()
    {
        $result                         = $this->recipeManager->saveRecipe($this->request->all());

        return response()->json($result, 200);
    }

    /**
     * Update recipe by ID
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateRecipe($id)
    {
        $result                         = $this->recipeManager->updateRecipe($id, $this->request->all());

        return response()->json($result, 200);
    }

    /**
     * Delete recipe by ID
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteRecipe($id)
    {
        $result                         = $this->recipeManager->deleteRecipeById($id);

        return response()->json(['status' => $result, 'data' => "Recipe $id deleted"], 200);
    }

    /**
     * List all recipes
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function recipes()
    {
        $results                        = Recipes::all();

        return response()->json($results);
    }

    /**
     * Submit user rating for a given recipe
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function rateRecipe()
    {
        $data                           = $this->request->all();

        $result                         = $this->recipeManager->submitRating($data);

        return response()->json($result, 200);
    }
}
