<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaction extends Model
{
    use HasFactory;
    public $table='transaction';
    public $guarded=[];


    public function transactionRef(): HasOne{
        return $this->hasOne(TransactionRef::class, 'id', 'transaction_ref_id');
    }
}
