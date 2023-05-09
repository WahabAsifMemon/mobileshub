<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    $title = $faker->name;
    return [
        'title' => $title,
        'slug' => Str::slug($title, '-'),
        'brand_type' => $faker->randomElement(['newer', 'older', 'slider' , 'brand']),
        'description' => $faker->text($maxNbChars = 400),
        'brand_img' => 'No image found',

        'status' => $faker->randomElement(['DEACTIVE', 'ACTIVE'])
    ];
});
