<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\TransactionRef;
use App\Models\YearlyBalance;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Livewire\Component;

class ModalAddEmployee extends Component
{
    public $show=false;
  
    public $prop;
    #[On('show-modal-add-employee')]
    public function showModal($prop=null){
      
        $this->show=true;
        $this->prop=$prop??"";
       
        
    }
    public function closeModal(){
        $this->show=false;
    }
    
    public function render()
    {
        
       $department=[
        [
            'id'=>1,
            'value'=>'Ketua',
        ],
        [
            'id'=>1,
            'value'=>'Panitera',
        ]
        ];

        $employeeData=Employee::find($this->prop);
        // dd($this->id);
        return view('livewire.modal-add-employee',['employeeData'=>$employeeData,'department'=>collect($department)]);
    }
}
