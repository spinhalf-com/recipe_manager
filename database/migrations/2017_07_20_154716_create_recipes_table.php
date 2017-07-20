<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();

            $table->string('box_type', 128)->unsigned();
            $table->string('title', 128)->unsigned();
            $table->string('slug', 128);
            $table->string('short_title', 128);
            $table->mediumText('marketing_description');
            $table->integer('calories_kcal');
            $table->integer('protein_grams');
            $table->integer('fat_grams');
            $table->integer('carbs_grams');
            $table->string('bulletpoint1', 45)->nullable();
            $table->string('bulletpoint2', 45)->nullable();
            $table->string('bulletpoint3', 45)->nullable();
            $table->string('recipe_diet_type_id', 45);
            $table->string('season', 45)->nullable();
            $table->string('base', 45)->nullable();
            $table->string('protein_source', 45)->nullable();
            $table->integer('preparation_time_minutes')->nullable();
            $table->integer('shelf_life_days')->nullable();
            $table->string('equipment_needed', 45)->nullable();
            $table->string('origin_country', 45)->nullable();
            $table->string('recipe_cuisine', 45)->nullable();
            $table->string('in_your_box', 128)->nullable();
            $table->integer('gousto_reference');
        });
    }

    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
