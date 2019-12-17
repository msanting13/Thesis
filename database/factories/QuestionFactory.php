<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence,
        'category_id' => $faker->numberBetween(1, 4),
        // 'answers_key' => $faker->randomElement(['a', 'b', 'c', 'd', 'e']),
        'answers_key' => 'A',
        'type_id' => 1,
    ];
});
