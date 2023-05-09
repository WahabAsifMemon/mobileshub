<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $title = $faker->name;
    return [
        'title' => $faker->randomElement(['infinix','realme','tecno', 'iphone' ,'lenovo', 'samsung']),
        'slug' => Str::slug($title, '-'),
        'designation' => $faker->jobTitle,
        'availability' => $faker->randomElement(['Stock', 'out of Stock']),
        'edition_number' => $faker->randomElement(['1st Edition','2nd Edition','3rd Edition']),
        'camera' => $faker->randomElement(['50','48','32', '16' ,'8', '5']),
        'battery_mah' => $faker->randomElement(['5000 ','4500 ','3000', '2500']),
        'price' => $faker->randomElement(['5000 ','4500 ','3000', '2500']),

        'variation' => $faker->randomElement(['1','2','3']),
        'mobile_img' => 'No image found',
        'description' => $faker->text($maxNbChars = 400),
        'status' => $faker->randomElement(['DEACTIVE', 'ACTIVE'])
    ];
});
