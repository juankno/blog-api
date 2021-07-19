<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text($maxNbCharts = 200),
        'user_id' => User::all()->random(),
        'post_id' => Post::all()->random(),
    ];
});
