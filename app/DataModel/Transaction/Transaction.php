<?php

namespace App\DataModel\Transaction;

use Illuminate\Database\Eloquent\Model;
use App\DataModel\Transaction\Parcel;
use App\User;

/**
 * @property integer $value  Dollar value amount of sale transaction.
 * @property string $type  Type of transaction. This dictates which forms are expected.
 * @property date $offer_date
 * @property date $acceptance_date
 * @property date $current_close
 * @property string $status
 * 
 */
class Transaction extends Model
{
    protected $cast = [
        'current_close_date'=>'date',
        'offer_date'=>'date',
        'acceptance_date'=>'date',
        'list_date'=>'date',
        'list_expiration'=>'date'
    ];
    protected $fillable = [
        'value',
        'parcel_id',
        'owner_id',
        'type',
        'offer_date',
        'acceptance_date',
        'current_close_date',
        'status',
        'inspection_contingency_duration',
        'appraisal_contingency_duration',
        'loan_contingency_duration',
        'list_date',
        'list_expiration'
    ];
    public function parcel(){
        return $this->belongsTo(Parcel::class,'parcel_id');
    }
    public function owner(){
        return $this->belongsTo(User::class,'owner_id');
    }
}
