<?php

namespace App\Exports;

use App\Models\Employee;
use App\Models\Transaction;
use App\Models\YearlyBalance;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;

class TransactionExport implements FromCollection, ShouldAutoSize, WithMapping, WithEvents, WithCustomStartCell,WithCustomValueBinder
{
    /**
    * @return \Illuminate\Support\Collection
    */
    
    protected $no=1;
    public function __construct( public string $month, 
    public string $year, public string $city, public string $reportDate
    )
    {
        
    }
    public function registerEvents() : array
{
    return [
        AfterSheet::class    => function(AfterSheet $event) {

            // Title
            $event->sheet->setCellValue('A1', 'BUKU INDUK KEUANGAN PERKARA PERDATA (KI-A7) PN');
            $event->sheet->getDelegate()->getStyle('A1:J1')->getFont()->setSize(20);
            $event->sheet->setCellValue('J1', 'BUKU INDUK KEUANGAN PERKARA PERDATA (KI-A7) PN');
            $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(0.45,'in');
            $event->sheet->getDelegate()->getRowDimension('4')->setRowHeight(0.42,'in');
            $event->sheet->getDelegate()->getStyle('A1:Z1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            
            
            $event->sheet->getDelegate()->mergeCells('A1:I1');
            $event->sheet->getDelegate()->mergeCells('J1:Z1');
            
            // Sub Title
            $event->sheet->setCellValue('A3', 'PEMASUKAN');
            $event->sheet->setCellValue('J3', 'PENGELUARAN');
            $event->sheet->getDelegate()->getStyle('A3')->getFont()->setSize(14);
            $event->sheet->getDelegate()->getStyle('J3')->getFont()->setSize(14);
            
            
            // Header
            $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(0.74,'in');
            //Pemasukan
            $event->sheet->setCellValue('A4', 'Nomor Urut');
            $event->sheet->getDelegate()->mergeCells('A4:A5');

            $event->sheet->setCellValue('B4', 'Tanggal');
            $event->sheet->getDelegate()->mergeCells('B4:B5');

            $event->sheet->setCellValue('C4', 'Nomor Perkara');
            $event->sheet->getDelegate()->mergeCells('C4:C5');

            $event->sheet->setCellValue('D4', 'Jumlah Panjar Biaya Perkara');
            $event->sheet->getDelegate()->mergeCells('D4:G4');

            $event->sheet->setCellValue('D5', 'Tingkat Pertama');
            $event->sheet->setCellValue('E5', 'Tingkat Banding');
            $event->sheet->setCellValue('F5', 'Tingkat Kasasi');
            $event->sheet->setCellValue('G5', 'Peninjauan Kembali');

            $event->sheet->setCellValue('H4', 'Sisa Bulan Lalu');
            $event->sheet->getDelegate()->mergeCells('H4:H5');

            $event->sheet->setCellValue('I4', 'Jumlah Penerimaan');
            $event->sheet->getDelegate()->mergeCells('I4:I5');

            //Pengeluaran
            $event->sheet->setCellValue('J4', 'Biaya Pemberkasan/ATK');
            $event->sheet->getDelegate()->mergeCells('J4:J5');

            $event->sheet->setCellValue('K4', 'Panggilan');
            $event->sheet->getDelegate()->mergeCells('K4:L4');
            $event->sheet->setCellValue('K5', 'Jenis');
            $event->sheet->setCellValue('L5', 'Jumlah');

            $event->sheet->setCellValue('M4', 'Penerjemah');
            $event->sheet->getDelegate()->mergeCells('M4:M5');

            $event->sheet->setCellValue('N4', 'Sita');
            $event->sheet->getDelegate()->mergeCells('N4:O4');
            $event->sheet->setCellValue('N5', 'Jenis');
            $event->sheet->setCellValue('O5', 'Jumlah');

            $event->sheet->setCellValue('P4', 'Pemeriksaan Setempat');
            $event->sheet->getDelegate()->mergeCells('P4:P5');
            $event->sheet->setCellValue('Q4', 'Sumpah');
            $event->sheet->getDelegate()->mergeCells('Q4:Q5');

            $event->sheet->setCellValue('R4', 'Pemberitahuan');
            $event->sheet->getDelegate()->mergeCells('R4:S4');
            $event->sheet->setCellValue('R5', 'Jenis');
            $event->sheet->setCellValue('S5', 'Jumlah');

            $event->sheet->setCellValue('T4', 'Biaya Pengiriman');
            $event->sheet->getDelegate()->mergeCells('T4:U4');
            $event->sheet->setCellValue('T5', 'Jenis');
            $event->sheet->setCellValue('U5', 'Jumlah');

            $event->sheet->setCellValue('V4', 'Materai');
            $event->sheet->getDelegate()->mergeCells('V4:V5');

            $event->sheet->setCellValue('W4', 'Hak-hak Kepaniteraan/PNBP');
            $event->sheet->getDelegate()->mergeCells('W4:X4');
            $event->sheet->setCellValue('W5', 'Jenis');
            $event->sheet->setCellValue('X5', 'Jumlah');

            $event->sheet->setCellValue('Y4', 'Pengembalian Sisa Panjar');
            $event->sheet->getDelegate()->mergeCells('Y4:Y5');

            $event->sheet->setCellValue('Z4', 'Jumlah Pengeluaran');
            $event->sheet->getDelegate()->mergeCells('Z4:Z5');
            $no=1;
            foreach(range('A','Z') as $letter) {

                $event->sheet->setCellValue($letter.'6', $no++);
            }

            $headerArray = [
                'font' => [
                    'bold' => true,
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ]
            ];
            
            $event->sheet->getDelegate()->getStyle('A4:Z6')->applyFromArray($headerArray);
            $event->sheet->getDelegate()->getStyle('A4:Z6')->getAlignment()->setWrapText(true);

            $dataArray = [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
                        
                    ],
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
                ],
            ];
            
            
            $maxRow=$event->sheet->getDelegate()->getHighestRow();
            $event->sheet->getDelegate()->getStyle('A7:Z'.$maxRow.'')->applyFromArray($dataArray);
           
            $event->sheet->getDelegate()->getStyle('A7:C'.$maxRow.'')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $event->sheet->getDelegate()->getStyle('K7:K'.$maxRow.'')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $event->sheet->getDelegate()->getStyle('N7:N'.$maxRow.'')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $event->sheet->getDelegate()->getStyle('R7:R'.$maxRow.'')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $event->sheet->getDelegate()->getStyle('T7:T'.$maxRow.'')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $event->sheet->getDelegate()->getStyle('W7:W'.$maxRow.'')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);

            
            $thisYearBalance=YearlyBalance::where('year',$this->year)->first();
            $firtDayOfThePeriod=$this->year."-01-01";
            $lastDayPreviousMonth=Carbon::create()->month($this->month)->subMonth()->endOfMonth()->year($this->year)->format('Y-m-d');
            $expenseBeforePeriod=$this->month==1?0:Transaction::whereHas('transactionRef',function($q){
                $q->where('transaction_type',-1);
            })->whereBetween('transaction_date',[$firtDayOfThePeriod,$lastDayPreviousMonth])->get()->sum('transaction_amount');
            $incomeBeforePeriod=$this->month==1?0:Transaction::whereHas('transactionRef',function($q){
                $q->where('transaction_type',1);
            })->whereBetween('transaction_date',[$firtDayOfThePeriod,$lastDayPreviousMonth])->get()->sum('transaction_amount');

            $incomeThisPeriod=Transaction::whereHas('transactionRef',function($q){
                $q->where('transaction_type',1);
            })->whereMonth('transaction_date',$this->month)->whereYear('transaction_date',$this->year)->get()->sum('transaction_amount');
            $expenseThisPeriod=Transaction::whereHas('transactionRef',function($q){
                $q->where('transaction_type',-1);
            })->whereMonth('transaction_date',$this->month)->whereYear('transaction_date',$this->year)->get()->sum('transaction_amount');
// dd($incomeThisPeriod);
            $balanceBeforePeriod=$thisYearBalance->balance+$incomeBeforePeriod-$expenseBeforePeriod;
            $balanceThisPeriod=$balanceBeforePeriod+$incomeThisPeriod-$expenseThisPeriod;

            // Starting point footer
            $startFooter=$maxRow+4;

            $event->sheet->setCellValue('J'.$startFooter,'Saldo bulan lalu');
            $event->sheet->setCellValue('K'.$startFooter,"Rp".number_format($balanceBeforePeriod,0,',','.'));
            $event->sheet->setCellValue('J'.$startFooter+1,'Pemasukan bulan ini');
            $event->sheet->setCellValue('K'.$startFooter+1,"Rp".number_format($incomeThisPeriod,0,',','.'));
            $event->sheet->setCellValue('J'.$startFooter+2,'Pengeluaran bulan ini');
            $event->sheet->setCellValue('K'.$startFooter+2,"Rp".number_format($expenseThisPeriod,0,',','.'));
            $event->sheet->setCellValue('J'.$startFooter+3,'Saldo bulan ini');
            $event->sheet->setCellValue('K'.$startFooter+3,"Rp".number_format($balanceThisPeriod,0,',','.'));

            $event->sheet->getDelegate()->getStyle('K'.$startFooter.':K'.$startFooter+3)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

            $bottomBorder=array(
                'borders' => [
                    'bottom' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            );
            $event->sheet->getStyle("J".($startFooter+2).":K".($startFooter+2))->applyFromArray($bottomBorder);
           
            $event->sheet->setCellValue('J'.$startFooter+5,'Mengetahui');
            $event->sheet->setCellValue('Y'.$startFooter+5,$this->city.', '.Carbon::parse($this->reportDate)->isoFormat('D MMMM Y'));

            $event->sheet->setCellValue('J'.$startFooter+6,'Ketua');
            $event->sheet->setCellValue('Y'.$startFooter+6,"Panitera");

            $ketua=Employee::where('department','Ketua')->first();
            $panitera=Employee::where('department','Panitera')->first();
            $event->sheet->setCellValue('J'.$startFooter+10,$ketua->name);
            $event->sheet->setCellValue('Y'.$startFooter+10,$panitera->name);
            $event->sheet->setCellValue('J'.$startFooter+11,$ketua->nip);
            $event->sheet->setCellValue('Y'.$startFooter+11,$panitera->nip);

            $event->sheet->getDelegate()->getStyle('J'.($startFooter+5).':Y'.($startFooter+11))->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
           
        },
    ];
}  

    // public function headings():array{
    //     return [
    //         ['Daftar Transaksi'],
    //         ['No', 'tanggal',]
    //     ];
    // }
   
    public function collection()
    {
        $transaction=Transaction::whereMonth('transaction_date',$this->month)->whereYear('transaction_date',$this->year)->get();
        return $transaction;
    }
    
    public function map($transaction):array
    {
        if($transaction){
            return [
                $this->no++,//A
                Carbon::parse($transaction->transaction_date)->format('d-m-Y'),//B
                $transaction->case_number,//C
                strtolower($transaction->transactionRef->transaction_name)=='panjar perkara' && strtolower($transaction->transactionRef->transaction_sub_name)=='tingkat pertama'?number_format($transaction->transaction_amount,0,',','.'):"",//D
                strtolower($transaction->transactionRef->transaction_name)=='panjar perkara' && strtolower($transaction->transactionRef->transaction_sub_name)=='tingkat banding'?number_format($transaction->transaction_amount,0,',','.'):"",//E
                strtolower($transaction->transactionRef->transaction_name)=='panjar perkara' && strtolower($transaction->transactionRef->transaction_sub_name)=='tingkat kasasi'?number_format($transaction->transaction_amount,0,',','.'):"",//F
                strtolower($transaction->transactionRef->transaction_name)=='panjar perkara' && strtolower($transaction->transactionRef->transaction_sub_name)=='tingkat pk'?number_format($transaction->transaction_amount,0,',','.'):"",//G
                "",//H
                strtolower($transaction->transactionRef->transaction_name)=='panjar perkara'?number_format($transaction->transaction_amount,0,',','.'):"",//I
                strtolower($transaction->transactionRef->transaction_name)=='biaya pemberkasan/atk'?number_format($transaction->transaction_amount,0,',','.'):"",//J
                strtolower($transaction->transactionRef->transaction_name)=='panggilan'?$transaction->transactionRef->transaction_sub_name:"",//K
                strtolower($transaction->transactionRef->transaction_name)=='panggilan'?number_format($transaction->transaction_amount,0,',','.'):"",//L
                strtolower($transaction->transactionRef->transaction_name)=='penerjemah'?number_format($transaction->transaction_amount,0,',','.'):"",//M
                strtolower($transaction->transactionRef->transaction_name)=='sita'?$transaction->transactionRef->transaction_sub_name:"",//N
                strtolower($transaction->transactionRef->transaction_name)=='sita'?number_format($transaction->transaction_amount,0,',','.'):"",//O
                strtolower($transaction->transactionRef->transaction_name)=='pemeriksaan setempat'?number_format($transaction->transaction_amount,0,',','.'):"",//P
                strtolower($transaction->transactionRef->transaction_name)=='sumpah'?number_format($transaction->transaction_amount,0,',','.'):"",//Q
                strtolower($transaction->transactionRef->transaction_name)=='pemberitahuan'?$transaction->transactionRef->transaction_sub_name:"",//R
                strtolower($transaction->transactionRef->transaction_name)=='pemberitahuan'?number_format($transaction->transaction_amount,0,',','.'):"",//S
                strtolower($transaction->transactionRef->transaction_name)=='biaya pengiriman'?$transaction->transactionRef->transaction_sub_name:"",//T
                strtolower($transaction->transactionRef->transaction_name)=='biaya pengiriman'?number_format($transaction->transaction_amount,0,',','.'):"",//U
                strtolower($transaction->transactionRef->transaction_name)=='materai'?number_format($transaction->transaction_amount,0,',','.'):"",//V
                strtolower($transaction->transactionRef->transaction_name)=='hak hak kepaniteraan/pnbp'?$transaction->transactionRef->transaction_sub_name:"",//W
                strtolower($transaction->transactionRef->transaction_name)=='hak hak kepaniteraan/pnbp'?number_format($transaction->transaction_amount,0,',','.'):"",//X
                strtolower($transaction->transactionRef->transaction_name)=='pengembalian sisa panjar'?number_format($transaction->transaction_amount,0,',','.'):"",//Y
                in_array(strtolower($transaction->transactionRef->transaction_name),['biaya pemberkasan/atk','panggilan','penerjemah','sita','pemeriksaan setempat','sumpah','pemberitahuan','biaya pengiriman','materai','hak hak kepaniteraan/pnbp','pengembalian sisa panjar'])?number_format($transaction->transaction_amount,0,',','.'):0,//Z
              
                
            ]; 
        }
       
    }

    public function startCell(): string
    {
        return 'A7';
    }

    public function bindValue(Cell $cell, $value)
    {
        $cell->setValueExplicit($value, DataType::TYPE_STRING2);
        return true;
    }

    
}
