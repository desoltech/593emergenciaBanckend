<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Request;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Request::class, function (Faker $faker) {
    return [
        'id_user' => $faker->name,
        'remember_token' => Str::random(10),
        'type' => 'obtener-ayuda',
        'id_help_type' => 1,
        'comments' => 1,
    ];
});
