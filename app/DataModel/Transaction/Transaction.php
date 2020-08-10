<?php

namespace App\DataModel\Transaction;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $value  Dollar value amount of sale transaction.
 * @property string $type  Type of transaction. This dictates which forms are expected.
 * @property date $offer_date
 * @property date $acceptance_date
 */
class Transaction extends Model
{
    //
}
