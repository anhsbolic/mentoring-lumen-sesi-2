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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->username,
        'email' => $faker->email,
    ];
});

$factory->define(App\UserProfile::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName('male'),
        'last_name' => $faker->lastName,
        'gender' => config('gender.male'),
    ];
});