<?php

namespace App\Livewire;

use App\Models\Transaction;
use App\Models\TransactionRef;
use Illuminate\Support\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalPrintPerkara extends Component
{
    public $show=false;
    public $month;
    public $year;
   
    #[On('show-modal-print-perkara')]
    public function showModal(){
        $this->show=true;
       
        
    }
    public function closeModal(){
        $this->show=false;
    }
    
    public function render()
    {
       
        $month_array=[];

        for ($i=1; $i <=12 ; $i++) { 
            $month_array[]= ['id'=>$i,'name'=>Carbon::create()->startOfMonth()->month($i)->isoFormat('MMMM')];
        }

        $this->month=collect($month_array);
        
        $this_year=now()->format('Y');
        $year_array=[];
        for ($i=0; $i <10 ; $i++) { 
            $year_array[]= ['id'=>$i,'name'=>(int)$this_year-$i];
        }

        $this->year=collect($year_array);

        return view('livewire.modal-print-perkara');
    }
}
