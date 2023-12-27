<?php

namespace Database\Seeders;

use App\Models\TransactionRef;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionRefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas=[
            [
                'transaction_type'=>1,
                'transaction_name'=>'Panjar Perkara',
                'transaction_sub_name'=>'Tingkat Pertama'
            ],
            [
                'transaction_type'=>1,
                'transaction_name'=>'Panjar Perkara',
                'transaction_sub_name'=>'Tingkat Banding'
            ],
            [
                'transaction_type'=>1,
                'transaction_name'=>'Panjar Perkara',
                'transaction_sub_name'=>'Tingkat Kasasi'
            ],
            [
                'transaction_type'=>1,
                'transaction_name'=>'Panjar Perkara',
                'transaction_sub_name'=>'Tingkat PK'
            ],
            [
                'transaction_type'=>-1,
                'transaction_name'=>'Biaya Pemberkasan/ATK',
               
            ],
           
            [
                'transaction_type'=>-1,
                'transaction_name'=>'Penerjemah',

            ],
            [
                'transaction_type'=>-1,
                'transaction_name'=>'Pemeriksaan Setempat',
              
            ],
            [
                'transaction_type'=>-1,
                'transaction_name'=>'Sumpah',
                
            ],
            [
                'transaction_type'=>-1,
                'transaction_name'=>'Materai',
                
            ],
            [
                'transaction_type'=>-1,
                'transaction_name'=>'Pengembalian Sisa Panjar',
                
            ],

            
        ];

        foreach($datas as $data){
            TransactionRef::create($data);
        }
    }
}
