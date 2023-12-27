<?php

use App\Http\Controllers\JurnalPerkaraController;
use App\Http\Controllers\OtentifikasiController;
use App\Http\Controllers\ReferenceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('guest')->group(function(){
    Route::get('/login',[OtentifikasiController::class,'index'])->name('login');
    Route::post('/attemptlogin',[OtentifikasiController::class,'attemptLogin']);
});

Route::middleware('auth')->group(function(){
    Route::controller(OtentifikasiController::class)->group(function () {
        Route::get('/logout', 'logout');
        Route::get('/daftar_akun', 'daftarAkun')->name('reference.user');
        Route::get('/get_daftar_akun', 'getDaftarAkun');
        Route::post('/insert_akun', 'insertAkun');
        Route::post('/edit_akun', 'editAkun');
        Route::post('/delete_akun', 'deleteAkun');
    
       
    });

    Route::get('/', function () {
        return view('dashboard');
    });
    
    Route::controller(JurnalPerkaraController::class)->group(function(){
        Route::get('cash/{type}', 'cash');
        Route::get('get_data_perkara_in/{type}', 'getDataPerkara');
        Route::post('perkara_insert', 'insert')->name('perkara.insert');
        Route::post('perkara_delete', 'delete')->name('perkara.delete');
        Route::post('print', 'print')->name('perkara.print');
    });
    
    Route::controller(ReferenceController::class)->group(function(){
        Route::get('reference_transaction_account', 'transactionAccount')->name('reference.transaction_account');
        Route::get('get_data_transaction_account', 'getDataTransactionAccount');
        
        Route::post('delete_transaction_account', 'deleteTransactionAccount')->name('reference.delete_transaction_account');
        Route::post('insert_transaction_reference', 'insertTransactionReference')->name('reference.insert_transaction_reference');
        Route::post('delete_transaction_reference', 'deleteTransactionReference')->name('reference.delete_transaction_reference');
        Route::get('reference_balance', 'balance')->name('reference.balance');
        Route::get('get_data_balance', 'getDataBalance');
        Route::post('insert_balance', 'insertBalance')->name('reference.insert_balance');
        Route::post('delete_balance', 'deleteBalance')->name('reference.delete_balance');
        Route::get('reference_employee', 'employee')->name('reference.employee');
        Route::get('get_data_employee', 'getDataEmployee');
        Route::post('insert_employee', 'insertEmployee')->name('reference.insert_employee');
        Route::post('delete_employee', 'deleteEmployee')->name('reference.delete_employee');
    });
});

