<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\SchoolYear;

$factory->define(SchoolYear::class, function (Faker $faker) {
    return [
        'school_year' => '2019-2020',
        'is_open' => 1,
    ];
});
