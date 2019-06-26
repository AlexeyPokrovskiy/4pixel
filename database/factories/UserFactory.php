<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Section;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->defineAs(User::class,'users', function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt(Str::random(10)), // password
        'remember_token' => Str::random(10),
    ];
});

$factory->defineAs(Section::class,'sections', function (Faker $faker) {
    return [
        'title' => $faker->title,
        'logo' => "",
        'description' => $faker->paragraph,
    ];
});
