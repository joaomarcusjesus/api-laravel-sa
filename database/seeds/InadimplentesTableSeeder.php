<?php

use Illuminate\Database\Seeder;

class InadimplentesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\Inadimplente::class, 1)->create();
    }
}
