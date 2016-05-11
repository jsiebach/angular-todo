<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\TodoList::class, function (Faker\Generator $faker) {

    $icons = array("fa-cog","fa-eye","fa-star","fa-pied-piper");

    return [
        'name' => $faker->name,
        'icon' => $icons[array_rand($icons)]
    ];
});


$factory->define(App\Todo::class, function (Faker\Generator $faker) {

    $priorities = array('low','medium','high');

    $statuses = array('complete','not_complete');

    return [
        'task' => $faker->name,
        'due_date' => $faker->dateTimeBetween('+5 days', '+20 days')->format('Y-m-d h:i:s'),
        'priority' => $priorities[array_rand($priorities)],
        'status' => $statuses[array_rand($statuses)],
    ];
});
