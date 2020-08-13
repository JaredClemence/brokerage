<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\DataModel\Transaction\Transaction;
use App\DataModel\Transaction\Parcel;
use App\User;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'value'=>$faker->numberBetween(100000,600000),
        'parcel_id'=>factory(Parcel::class)->create()->id,
        'owner_id'=>factory(User::class)->create()->id,
        'type'=>'Residential',
        'list_date'=>null,
        'offer_date'=>null,
        'acceptance_date'=>null,
        'current_close_date'=>null,
        'status'=>$faker->randomElement(['New','Offer Outstanding','Pending','Closed']),
        'inspection_contingency_duration'=>17,
        'appraisal_contingency_duration'=>17,
        'loan_contingency_duration'=>21
    ];
});
