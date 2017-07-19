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
     *
     *
     * @param string $cuisine
     */
    public function listRecipesByCuisine($cuisine, $page = 1)
    {
        $result                         = $this->recipeManager->listRecipesByCuisine($cuisine);

        return response()->json($result, $result['status']);
    }

    /**
     *
     *
     * @param int $id
     */
    public function getRecipe($id)
    {
        $result                         = $this->recipeManager->getRecipeById($id);

        return response()->json($result, 200);
    }

    /**
     *
     *
     */
    public function saveRecipe()
    {
        $result                         = $this->recipeManager->saveRecipe($this->request->all());

        return response()->json($result, 200);
    }

//    /**
//     *
//     *
//     * @param int $id
//     */
//    public function updateRecipe($id)
//    {
//        return response()->json($result, 200);
//    }
//
//    /**
//     *
//     *
//     * @param int $id
//     */
//    public function deleteRecipe($id)
//    {
//        return response()->json($result, 200);
//    }


    public function recipes()
    {
        $results = Recipes::all();

        return response()->json($results);
    }

    public function rateRecipe()
    {
        $data                           = $this->request->all();

        $result                         = $this->recipeManager->submitRating($data);

        return response()->json($result, 200);
    }
}
