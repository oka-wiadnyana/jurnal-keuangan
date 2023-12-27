<?php

namespace App\Livewire;

use App\Models\TransactionRef;
use App\Models\YearlyBalance;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalAddBalance extends Component
{
    public $show=false;
  
    public $prop;
    #[On('show-modal-add-balance')]
    public function showModal($prop=null){
      
        $this->show=true;
        $this->prop=$prop??"";
       
        
    }
    public function closeModal(){
        $this->show=false;
    }
    
    public function render()
    {
        
        $thisYear=Carbon::now()->format('Y');
        $years=[];
        for($i=0;$i<10;$i++){
            $years[]=['value'=>$thisYear-$i];
        }

        $balanceData=YearlyBalance::find($this->prop);
        // dd($this->id);
        return view('livewire.modal-add-balance',['years'=>collect($years),'balanceData'=>$balanceData]);
    }
}
