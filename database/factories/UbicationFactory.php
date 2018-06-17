<?php

use Faker\Generator as Faker;

$factory->define(App\Ubication::class, function (Faker $faker) {
    $ubication = $faker->text(50);
    return [
        'name' => $ubication,
        'slug' => str_slug($ubication)
    ];
});
