<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;


class ModalEditAkun extends Component
{
   
    public $show = false;
    public $id;
    public $data;
 
    #[On('show-modal-edit-akun')]
    public function showModal($id)
    {
       
       $this->id = $id;
       $this->show = true;
      
    }
 
    public function closeModal()
    {
 
      
        $this->show = false;
    }
 
   
    public function render()
    {
        
      
        $akun=User::where('id',$this->id)->first();
        return view('livewire.modal-edit-akun',['akun'=>$akun]);
    }
}
