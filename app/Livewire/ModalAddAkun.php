<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;


class ModalAddAkun extends Component
{
   
    public $show = false;
    
    public $data;
 
    #[On('show-modal-tambah-akun')]
    public function showModal()
    {
       
       $this->show = true;
      
    }
 
    public function closeModal()
    {
 
      
        $this->show = false;
    }
 
   
    public function render()
    {
        
        
        // $months=getMonthNames();
        return view('livewire.modal-add-akun');
    }
}
