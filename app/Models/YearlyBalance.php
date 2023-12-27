<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearlyBalance extends Model
{
    use HasFactory;
    public $table='yearly_balance';
    public $guarded=[];
}
