<?php

namespace Database\Seeders;

use App\Models\YearlyBalance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        YearlyBalance::create(['year'=>'2023','balance'=>200000]);
    }
}
