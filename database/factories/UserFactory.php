<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
    //填充到数据表的格式
        "username"=>$faker->userName,
        "truename"=>$faker->name,
        'password'=>bcrypt('admin'),
        'email'=>$faker->email,
        'phone'=>$faker->phoneNumber,
        'sex'=>['先生','女士'][rand(0,1)],
        'last_ip'=>'127.0.0.1'

    ];
});
