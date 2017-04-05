<?php

use Illuminate\Database\Seeder;

class TipoAreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\TipoArea::class, 20)->create();
    }
}
