<?php

namespace App\Livewire;

use App\Models\TransactionRef;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalAddPerkara extends Component
{
    public $show=false;
    public $transactionRef;
    public $prop;
    #[On('show-modal-perkara')]
    public function showModal($prop){
        $this->show=true;
        $this->prop=$prop??"";
       
        
    }
    public function closeModal(){
        $this->show=false;
    }
    
    public function render()
    {
        if($this->prop){
            $this->transactionRef=TransactionRef::where('transaction_type',$this->prop)->orderByDesc('transaction_name')->get();
        }else {
            $this->transactionRef=TransactionRef::where('transaction_type',1)->orderByDesc('transaction_name')->get();
        }
        

        return view('livewire.modal-add-perkara');
    }
}
