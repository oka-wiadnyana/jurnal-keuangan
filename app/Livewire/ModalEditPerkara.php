<?php

namespace App\Livewire;

use App\Models\Transaction;
use App\Models\TransactionRef;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalEditPerkara extends Component
{
    public $show=false;
    public $transactionRef;
    public $id;
    #[On('show-modal-perkara-edit')]
    public function showModal($id){
        $this->show=true;
        $this->id=$id;
        
    }
    public function closeModal(){
        $this->show=false;
    }
    
    public function render()
    {
       
        $data=Transaction::find($this->id);
        $this->transactionRef=TransactionRef::where('transaction_type',$data?->transactionRef?->transaction_type)->orderByDesc('transaction_name')->get();

        return view('livewire.modal-edit-perkara',compact('data'));
    }
}
