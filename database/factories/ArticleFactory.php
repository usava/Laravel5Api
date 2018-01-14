<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {

    $faker = \Faker\Factory::create('ru_RU');

    return [
        'title'=>$faker->text(50, true),
        'body'=>$faker->text()
    ];
});
