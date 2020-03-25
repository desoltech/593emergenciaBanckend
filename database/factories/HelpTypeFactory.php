<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\HelpType;
use Faker\Generator as Faker;

$factory->define(HelpType::class, function (Faker $faker) {
    return [
        'name' => 'Alimento',
    ];
});
