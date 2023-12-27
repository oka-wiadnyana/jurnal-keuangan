<?php

namespace App\Livewire;

use App\Models\Result;
use App\Models\Transaction;
use App\Models\YearlyBalance;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardView extends Component
{

   
    public $year=[];
    public $bg=[];
    public $result;
   
    public $filterYear;
    public $beginningBalance;
    public $incomeThisPeriod;
    public $expenseThisPeriod;
    public $balanceThisPeriod;

    public function mount()
    {
      
        $this_year=now()->format('Y');

        $year_array=[];
        for ($i=0; $i <10 ; $i++) { 
            $year_array[]= ['id'=>$i,'name'=>(int)$this_year-$i];
        }

        $this->year=collect($year_array);
        $this->bg=['success','warning','danger','info'];

        $this->filterYear=now()->format('Y');

        $this->beginningBalance=YearlyBalance::where('year',$this->filterYear)->first()->balance;
        $this->incomeThisPeriod=Transaction::whereHas('transactionRef',function($q){
            $q->where('transaction_type',1);
        })->whereYear('transaction_date',$this->filterYear)->get()->sum('transaction_amount');
        $this->expenseThisPeriod=Transaction::whereHas('transactionRef',function($q){
            $q->where('transaction_type',-1);
        })->whereYear('transaction_date',$this->filterYear)->get()->sum('transaction_amount');
        $this->balanceThisPeriod=$this->beginningBalance+$this->incomeThisPeriod-$this->expenseThisPeriod;

        // $this->result=$result->sortByDesc('avg');

        // dd($this->result);
    }

    public function getData(){
        $this->beginningBalance=YearlyBalance::where('year',$this->filterYear)->first()->balance??0;
        $this->incomeThisPeriod=Transaction::whereHas('transactionRef',function($q){
            $q->where('transaction_type',1);
        })->whereYear('transaction_date',$this->filterYear)->get()->sum('transaction_amount')??0;
        $this->expenseThisPeriod=Transaction::whereHas('transactionRef',function($q){
            $q->where('transaction_type',-1);
        })->whereYear('transaction_date',$this->filterYear)->get()->sum('transaction_amount')??0;
        $this->balanceThisPeriod=$this->beginningBalance+$this->incomeThisPeriod-$this->expenseThisPeriod;
    }
 
    public function render()
    {
        return view('livewire.dashboard-view');
    }
}
