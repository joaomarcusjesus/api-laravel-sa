<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\SA\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(SA\Models\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'user_id' => rand(1,21)
    ];
});

$factory->define(SA\Models\BillPay::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'date_due' => $faker->date(),
        'value' => $faker->randomFloat(2,100,1000),
        'done' => (bool) rand(0,1),
        'category_id' => rand(1,50),
        'user_id' => rand(1,21)
    ];
});

$factory->define(SA\Models\Reserva::class, function (Faker\Generator $faker) {

    return [
        'dt_reserva' => $faker->date(),
        'hr_inicio' => $faker->time(),
        'hr_fim' => $faker->time(),
        'id_numero_imovel' => rand(1,5),
        'id_bloco' => rand(1,1),
        'id_cadastro_reserva_area_comum' => rand(1,2),
        'id_area_pai' => rand(1,1)
    ];
});

$factory->define(SA\Models\Inadimplente::class, function (Faker\Generator $faker) {

    return [
        'usuario' => 'imo101',
        'st_inadimplente' => 'S'
    ];
});


$factory->define(SA\Models\TipoArea::class, function (Faker\Generator $faker) {

    return [
        'de_tipo_area' => $faker->name,
    ];
});

$factory->define(SA\Models\AreaPai::class, function (Faker\Generator $faker) {

    return [
        'de_area_pai' => $faker->name,
    ];
});

$factory->define(SA\Models\AreaComum::class, function (Faker\Generator $faker) {

    return [
        'id_tipo_area' => rand(1,20),
        'id_area_pai' => rand(1,20),
        'de_tipo_area' => $faker->name,
    ];
});
