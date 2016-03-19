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
        'url' => 'https://www.youtube.com/watch?v=9FipWCyIF4Y',
        'description' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'user_id' => 1,
        'views' => rand(1, 100),
    ];
});
$factory->define(Ocademy\Comment::class, function (Faker\Generator $faker) {
    return [
        'comment' => $faker->sentence,
        'video_id' => rand(1, 11),
        'user_id' => rand(1, 10),
    ];
});
$factory->define(Ocademy\Favorite::class, function (Faker\Generator $faker) {
    return [
        'video_id' => rand(1, 11),
        'user_id' => rand(1, 10),
    ];
});
