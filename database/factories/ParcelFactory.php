<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\DataModel\Transaction\Parcel;

$factory->define(Parcel::class, function (Faker $faker) {
    return [
        'apn'=>function() use ($faker){
            $string = 'XXX-XXX-XX-XX-X';
            do{
                $loc = strpos($string, 'X');
                if( $loc !== false ){
                    $string[$loc] = $faker->randomDigit;
                }
            }while($loc !== false );
            return $string;
        },
        'street'=>$faker->streetAddress,
        'city'=>'Bakersfield',
        'state'=>'CA',
        'zip'=>$faker->randomElement(['93309','93306','93304','93305','93307','93308'])
    ];
});
