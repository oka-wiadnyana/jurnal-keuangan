<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionNameRef extends Model
{
    use HasFactory;
    public $table='transaction_name_ref';
    public $guarded=[];
}
