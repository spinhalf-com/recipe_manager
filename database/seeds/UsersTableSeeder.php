<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->truncate();
        \DB::table('users')->insert(
        [
            0 =>
                [
                    'id' => 1,
                    'name' => 'John Doe',
                    'email' => 'jdoe@email.com',
                    'api_token' => '689vh7821945gj9jx2893u48347uhfi323h2c94839ygshkw837u64wcj4390bjvc029',
                    'remember_token' => NULL
                ],
            1 =>
                [
                    'id' => 2,
                    'name' => 'Jane Doe',
                    'email' => 'janedoe@email.com',
                    'api_token' => '4093hgund3ik94082slcimu42y8vb478ehx8935843iq9mvc028u12qhudiwpldijchutu9646',
                    'remember_token' => NULL
                ],
        ]);
    }
}
