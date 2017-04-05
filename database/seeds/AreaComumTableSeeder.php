<?php

use Illuminate\Database\Seeder;

class AreaComumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\AreaComum::class, 20)->create();
    }
}
