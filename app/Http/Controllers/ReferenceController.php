<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Transaction;
use App\Models\TransactionRef;
use App\Models\YearlyBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Number;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class ReferenceController extends Controller
{
    public function transactionAccount(Request $request){
       
        $datas=TransactionRef::all();
        
        return view('reference.transaction_account');
    }

    public function getDataTransactionAccount(Request $request){
        if ($request->ajax()) {
            $data = TransactionRef::orderByDesc('transaction_name')->get();
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="" class="edit btn btn-success btn-sm" onclick="showModalAdd(\'show-modal-add-transaction_ref\','.$row->id.'); return false">Edit</a> <a href""  onclick="deleteData(\''.route('reference.delete_transaction_reference').'\','.$row->id.');return false" class="delete btn btn-danger btn-sm">Delete</a> ';
                    return $row->transaction_name=='Panjar Perkara'||!$row->transaction_sub_name?"":$actionBtn;
                })
                
                ->addColumn('transaction_type', function($row){
                   
                    return $row->transaction_type==1?'Pemasukan':'Pengeluaran';
                })
             
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function insertTransactionReference(Request $request){
        $validate=Validator::make(
            $request->all(),
            [
                'transaction_name'=>['required'],
                'transaction_sub_name'=>['required'],
            ]
            );

            if($validate->fails()){
                Alert::error('Error',$validate->errors()->all());
                return back();
            }

            
            TransactionRef::updateOrCreate(
                ['id'=>$request->id],
                [
                    'transaction_name'=>$request->transaction_name,
                    'transaction_sub_name'=>$request->transaction_sub_name,
                    'transaction_type'=>-1
                    
                ]
            );

            Alert::success('Success',__('messages.insert'));
            return back();
    }

    public function deleteTransactionReference(Request $request){
        TransactionRef::destroy($request->id);
        return response()->json(['msg'=>'success']);
    }

    public function balance(Request $request){
       
       
        
        return view('reference.balance');
    }

    public function getDataBalance(Request $request){
        if ($request->ajax()) {
            $data = YearlyBalance::orderByDesc('year')->get();
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="" class="edit btn btn-success btn-sm" onclick="showModalAdd(\'show-modal-add-balance\','.$row->id.'); return false">Edit</a> <a href""  onclick="deleteData(\''.route('reference.delete_balance').'\','.$row->id.');return false" class="delete btn btn-danger btn-sm">Delete</a> ';
                    return $actionBtn;
                })
                ->addColumn('balance', function($row){
                   
                    return Number::currency($row->balance, in:"IDR", locale:'id');
                })
                
                
             
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function insertBalance(Request $request){
        $validate=Validator::make(
            $request->all(),
            [
                'year'=>['required'],
                'balance'=>['required'],
            ]
            );

            if($validate->fails()){
                Alert::error('Error',$validate->errors()->all());
                return back();
            }

            $isExist=YearlyBalance::where('year',$request->year)->first();

            if(!$request->id && $isExist){
                Alert::error('Error',__('messages.data_exist'));
                return back();
            }

            
            YearlyBalance::updateOrCreate(
                ['id'=>$request->id],
                [
                    'year'=>$request->year,
                    'balance'=>$request->balance,
                    
                    
                ]
            );

            Alert::success('Success',__('messages.insert'));
            return back();
    }

    public function deleteBalance(Request $request){
        YearlyBalance::destroy($request->id);
        return response()->json(['msg'=>'success']);
    }

    public function employee(Request $request){
       
       
        
        return view('reference.employee');
    }

    public function getDataEmployee(Request $request){
        if ($request->ajax()) {
            $data = Employee::all();
            
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="" class="edit btn btn-success btn-sm" onclick="showModalAdd(\'show-modal-add-employee\','.$row->id.'); return false">Edit</a> <a href""  onclick="deleteData(\''.route('reference.delete_employee').'\','.$row->id.');return false" class="delete btn btn-danger btn-sm">Delete</a> ';
                    return $actionBtn;
                })
               
                
             
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function insertEmployee(Request $request){
        $validate=Validator::make(
            $request->all(),
            [
                'name'=>['required'],
                'nip'=>['required'],
                'department'=>['required'],
            ]
            );

            if($validate->fails()){
                Alert::error('Error',$validate->errors()->all());
                return back();
            }

           

            
            Employee::updateOrCreate(
                ['id'=>$request->id],
                [
                    'name'=>$request->name,
                    'nip'=>$request->nip,
                    'department'=>$request->department,
                    
                    
                ]
            );

            Alert::success('Success',__('messages.insert'));
            return back();
    }

    public function deleteEmployee(Request $request){
        Employee::destroy($request->id);
        return response()->json(['msg'=>'success']);
    }
}
