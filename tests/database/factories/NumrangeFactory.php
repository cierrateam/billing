<?php

$factory->define(\Cierrateam\Billing\Models\Numrange::class, function (Faker\Generator $faker) {
    static $password;
    $nextrange_id = optional(\Cierrateam\Billing\Models\Numrange::first())->id;
    if(!$nextrange_id)
        $nextrange_id = factory(\Cierrateam\Billing\Models\Numrange::class)->create()->id;

    return [
        'next_range_id' => $nextrange_id,
        'storno_numrange_id' => $nextrange_id,
        'name' => $faker->word,
        'prefix' => 'RE'
    ];
});
