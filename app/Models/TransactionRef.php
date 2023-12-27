<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionRef extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table='transaction_ref';
    public $guarded=[];
}
