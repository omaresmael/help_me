<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ability;
use App\Models\Program;
use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => 'admin',
        'email' => 'admin@help.com',
        'position' =>'admin',
        'password' => bcrypt('123456789')
    ];
});




