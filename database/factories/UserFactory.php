<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'telefone' => $faker->phoneNumber,
    ];
});

$factory->define(App\Aluguel::class, function (Faker $faker) {
    return [
        'dataFesta' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'horarioInicio' => $faker->time($format = 'H:i', $max = 'now'),
        'horarioTermino' => $faker->time($format = 'H:i', $max = 'now'),
        'valorCobrado' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 5000),
        'endereco' => $faker->streetAddress,
        'complemento' => $faker->secondaryAddress,
        'cidade' => $faker->city,
        'uf' => $faker->state,
    ];
});

$factory->define(App\Tema::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'valorAluguel' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 5000),
        'corDestaque' => $faker->safeColorName,
    ];
});

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'descricao' => $faker->text($maxNbChars = 200),
    ];
});
