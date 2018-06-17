<?php

use Faker\Generator as Faker;

$factory->define(App\Dependence::class, function (Faker $faker) {
    $dependence = $faker->text(50);
    return [
        'name' => $dependence,
        'slug' => str_slug($dependence)
    ];
});
