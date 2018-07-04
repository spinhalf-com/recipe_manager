<?php

namespace spec\App\Recipes;

use App\Recipes\RecipeManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RecipeManagerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(RecipeManager::class);
    }

    function it_should_return_recipe_by_id()
    {
        $this->getRecipeById(1)->shouldReturn([]);
    }
}
