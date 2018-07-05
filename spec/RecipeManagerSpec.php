<?php

namespace spec\App\Recipes;

use App\Recipes\RecipeManager;
use PhpSpec\ObjectBehavior;
use PhpSpec\Lumen\LumenObjectBehavior;
use Prophecy\Argument;

class RecipeManagerSpec extends LumenObjectBehavior
{
    function it_is_initializable()
    {
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
        $result = $this->deleteRecipeById(1);

        $result->shouldHaveKeyWithValue("title", 'Sweet Chilli and Lime Beef on a Crunchy Fresh');
    }

    function it_should_delete_found_record()
    {
        $result = $this->deleteRecipeById(1);

        $result->shouldHaveKeyWithValue("status", true);
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
}
