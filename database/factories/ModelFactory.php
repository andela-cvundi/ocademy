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

$factory->define(Ocademy\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->userName,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'provider' => 'normal',
        'provider_id' => 'normal',
        'avatar' => 'http://res.cloudinary.com/suyabay/image/upload/v1458417521/jrtpr9kupslq2zvbl8ij.jpg',
        'info' => $faker->text,
        'remember_token' => str_random(10),
    ];
});

$factory->define(Ocademy\Category::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
    ];
});

$factory->define(Ocademy\Tutorial::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'url' => '9FipWCyIF4Y',
        'description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'user_id' => 1,
        'category_id' => 1,
    ];
});
