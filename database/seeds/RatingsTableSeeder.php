<?php

use Illuminate\Database\Seeder;

class RatingsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('ratings')->truncate();
        \DB::table('ratings')->insert(
        [
            0 =>
                [
                    'id' => '1',
                    'users_id' => 1,
                    'recipes_id' => 1,
                    'rating' => 5
                ]
        ]);
    }
}