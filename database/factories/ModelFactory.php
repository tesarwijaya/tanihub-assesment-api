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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Producer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'location' => $faker->state
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    static $availableTypes = ['kompilasi', 'pertanian', 'peternakan'];
    static $pertanian = ['wortel', 'paprika', 'kentang', 'cabai', 'beras', 'strawberry', 'tomat'];
    static $peternakan = ['sapi'];

    $selectedType = $faker->randomElement($availableTypes);
    if ($selectedType === 'kompilasi') {
        $selectedTitle = 'Budidaya Berbagai Macam Sayuran dan Buah';
        $selectedPicture = 'kompilasi.jpeg';
    }
    else if ($selectedType === 'pertanian') {
        $selectedTitle = $faker->randomElement($pertanian);
        $selectedPicture = $selectedTitle . '.jpeg';
    }
    else if ($selectedType === 'peternakan') {
        $selectedTitle = $faker->randomElement($peternakan);
        $selectedPicture = $selectedTitle . '.jpeg';
    }

    $selectedValue = $faker->numerify('###000000');
    $sellStart = $faker->dateTimeBetween($startDate = '-30 days', $endDate = '+20 days', $timezone = date_default_timezone_get());
    $sellEnd = $faker->dateTimeBetween($startDate = $sellStart, $endDate = '+60 days', $timezone = date_default_timezone_get());
    if ($sellStart->format('Y-m-d H:i:s') > date("Y-m-d H:i:s")) {
        $fund = 0;
    } else {
        $fund = $faker->numberBetween($min = 0, $max =(int)$selectedValue);
    }
    return [
        'type' => $selectedType,
        'title' => $selectedTitle,
        'picture' => $selectedPicture,
        'value' => $selectedValue,
        'fund' => $fund,
        'sellStart' => $sellStart,
        'sellEnd' => $sellEnd
    ];
});