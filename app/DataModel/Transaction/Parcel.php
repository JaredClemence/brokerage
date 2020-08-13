<?php

namespace App\DataModel\Transaction;

use Illuminate\Database\Eloquent\Model;
use App\DataModel\Transaction\Transaction;

/**
 * @property string $apn
 * @property string $unit   Unit number (condo, apartment, or other designator)
 * @property string $lot
 * @property string $block
 * @property string $parcel_num
 * @property string $city
 * @property string $state
 * @property string $zip
 */
class Parcel extends Model
{
    protected $fillable = [
        'apn',
        'lot',
        'block',
        'parcel_num',
        'street',
        'unit',
        'city',
        'state',
        'zip'
    ];
    
    public function transactions(){
        return $this->hasMany(Transaction::class,'parcel_id');
    }
}
