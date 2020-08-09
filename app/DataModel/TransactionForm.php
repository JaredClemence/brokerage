<?php

namespace App\DataModel;

use Illuminate\Database\Eloquent\Model;
use App\DataModel\ByteCode;
use App\DataModel\FileContent;

/**
 * @property string $name Form short name.
 * @property string $short Form short name.
 * @property text $content Binary PDF data.
 * @property string $byteCode Instructions for when to apply the form.
 * @property string $textCode Plaintext instructions for when to apply the form.
 * @property date $revised_on
 */
class TransactionForm extends Model
{
    protected $cast = [
        'revised_on'=>'date'
    ];
    
    public function content(){
        return $this->belongsTo(FileContent::class, 'file_content_id');
    }
    
    public function bytecode(){
        return $this->hasMany(ByteCode::class, 'form_id');
    }
}
