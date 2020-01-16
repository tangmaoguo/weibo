<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Status;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Status::class, function (Faker $faker) {
    return [
        'content' => $faker->text(),
        'user_id'=> Arr::random([1,2,3]),
        'created_at'=>$faker->dateTime(),
        'updated_at' => $faker->dateTime()

    ];
});
