<?php

/** @var \Illuminate\Database\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => "kaidi inssaf",
        'email' => "kaidi@gmail.com",
        'email_verified_at' => now(),
        'password' => Hash::make("kaidi"), // password
        'remember_token' => Str::random(10),
    ];
});


