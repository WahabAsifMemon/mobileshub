<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Variation;
use Faker\Generator as Faker;

$factory->define(Variation::class, function (Faker $faker) {
      $title = $faker->name;
    return [
        'ram' => $faker->randomElement(['16','8','6', '4' ,'2', '1']),
        'rom' => $faker->randomElement(['512 ','256 ','128', '64']),
    ];
});
