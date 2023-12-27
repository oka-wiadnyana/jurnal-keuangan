<?php

namespace App\Livewire;

use App\Models\TransactionRef;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalAddTransactionRef extends Component
{
    public $show=false;
    public $transactionRef;
   
    public $prop;
    #[On('show-modal-add-transaction_ref')]
    public function showModal($prop=null){
      
        $this->show=true;
        $this->prop=$prop??"";
       
        
    }
    public function closeModal(){
        $this->show=false;
    }
    
    public function render()
    {
        $selectAccount=collect([
            [
                'id'=>1,
                'value'=>'Panggilan'
            ],
            [
                'id'=>2,
                'value'=>'Sita'
            ],
            [
                'id'=>3,
                'value'=>'Pemberitahuan'
            ],
            [
                'id'=>4,
                'value'=>'Biaya Pengiriman'
            ],
            [
                'id'=>5,
                'value'=>'Hak-hak Kepaniteraan/PNBP'
            ],

        ]);
        

        $dataTransactionRef=TransactionRef::find($this->prop);
        // dd($this->id);
        return view('livewire.modal-add-transaction-ref',['data'=>$dataTransactionRef,'selectAccount'=>$selectAccount]);
    }
}
