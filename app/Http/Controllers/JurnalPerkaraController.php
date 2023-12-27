<?php

namespace App\Http\Controllers;

use App\Exports\TransactionExport;
use App\Exports\UserExport;
use App\Models\Employee;
use App\Models\Transaction;
use App\Models\YearlyBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Concerns\FromCollection;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class JurnalPerkaraController extends Controller
{
    public function cash(Request $request,$type){
       
    
        return view('perkara.cash',['type'=>$type]);
    }

    public function getDataPerkara(Request $request,$type){
        if ($request->ajax()) {
            $data = Transaction::whereHas('transactionRef',function($q) use($type){
                $q->where('transaction_type',$type);
            })->orderByDesc('transaction_date')->get();
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="" class="edit btn btn-success btn-sm" onclick="showModalEdit(\'show-modal-perkara-edit\','.$row->id.'); return false">Edit</a> <a href=""  onclick="deleteData(\''.route('reference.delete_transaction_reference').'\','.$row->id.');return false" class="delete btn btn-danger btn-sm">Delete</a> ';
                    return $actionBtn;
                })
                ->addColumn('transaction_name', function($row){
                    $transactionSubName=$row->transactionRef->transaction_sub_name?"-".$row->transactionRef->transaction_sub_name:"";
                    return $row->transactionRef->transaction_name.$transactionSubName;
                })
                ->addColumn('transaction_type', function($row){
                   
                    return $row->transactionRef->transaction_type==1?'Pemasukan':'Pengeluaran';
                })
                ->addColumn('transaction_date', function($row){
                   
                    return Carbon::parse($row->transaction_date)->isoFormat('D-M-Y');
                })
                
               
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function insert(Request $request){
        $validate=Validator::make(
            $request->all(),
            [
                'transaction_date'=>['required'],
                'case_number'=>['required'],
                'transaction_ref_id'=>['required'],
                'transaction_amount'=>['required'],
            ]
        );

        if($validate->fails()){
            Alert::error('Validation Error', $validate->errors()->all());
            return back();
        }

        $thisYearBalance=YearlyBalance::where('year',Carbon::parse($request->transaction_date)->format('Y'))->first();

        if(!$thisYearBalance){
            Alert::error('Validation Error', __('messages.balance_validation'));
            return back();
        }

        $validated=$validate->safe()->all();

        Transaction::updateOrCreate(
            ['id'=>$request->id],
            $validated);
        Alert::success('Berhasil', __('messages.insert'));
        return back();

    }

    public function delete(Request $request){
        Transaction::destroy($request->id);
        return response()->json(['msg'=>'success']);
    }

    public function print(Request $request){

        $validate=Validator::make(
            $request->all(),
            [
                'month'=>['required'],
                'year'=>['required'],
                'city'=>['required'],
                'reportDate'=>['required'],
            ]
            );

            if($validate->fails()){
                Alert::error('Error',$validate->errors()->all());
                return back();
            }

            $ketua=Employee::where('department','Ketua')->first();
            $panitera=Employee::where('department','Panitera')->first();
        if(!$ketua || !$panitera){
            Alert::error('Error',__('messages.employee_error'));
            return back();
        }
        return Excel::download(new TransactionExport($request->month,$request->year, $request->city, $request->reportDate), 'transaction.xlsx');
    }
}
