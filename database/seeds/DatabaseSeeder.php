<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BillPaysTableSeeder::class);
        $this->call(ReservasTableSeeder::class);
        $this->call(InadimplentesTableSeeder::class);
        $this->call(TipoAreasTableSeeder::class);
        $this->call(AreaPaisTableSeeder::class);
        $this->call(AreaComumTableSeeder::class);
    }
}
