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
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->name,
        'slug' => $faker->slug,
        'content' => $faker->text,
        'short_description' => $faker->text,
        'published' => 1,
        'published_on' => \Carbon\Carbon::now(),
        'user_id' => 1
    ];
});
$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->name,
        'slug' => $faker->slug,
        'logo' => 'no-image.png',
        'description' => $faker->text,
        'status' => 1,
        'featured' => 0,
    ];
});
$factory->define(App\Job::class, function (Faker\Generator $faker) {
    return [

    "user_id" => 1,
    "company_id" => 1,
    "slug" => $faker->slug,
    "title" => $faker->title,
    "categories" => 1,
    "about_job" => $faker->text,
    "description" => $faker->text,
    "facilities" => $faker->title,
    "country" => $faker->country,
    "duties" => $faker->text,
    "salary" => $faker->year,
    "cost" => $faker->year,
    "overtime" => $faker->year,
    "quantity" => $faker->year,
    "duty_hours" => $faker->year,
    "featured" => 0,
    "requirement" => $faker->text,
       
    ];
});
