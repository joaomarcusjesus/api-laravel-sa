<?php

use Illuminate\Database\Seeder;

class AreaPaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\AreaPai::class, 20)->create();
    }
}
