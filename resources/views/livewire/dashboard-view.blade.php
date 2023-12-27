<div class="card col p-4" >
 
    <div class="row" >
        <div class="col-6 d-flex align-items-center mb-3" >
            
            <div class="col">
                <x-partial.plain-select selectName="year" :selectValue=$year selectPlaceHolder="Tahun" optValue='name' optText='name' :optUpdateValue=$filterYear wire:model="filterYear"/>
            </div> 
            <div class="col d-flex align-items-center" >

                <x-partial.button class="btn btn-primary px-4 py-2 m-0" buttonText="Cari" buttonType="button" wire:click="getData" onclick="getData()"/>
            </div>
           
        </div>
      
    </div>
    <div class="col">
        <h5>Register Keuangan Perkara Perdata</h5>
      </div>
    <div class="table-responsive">
        <table class="table v-middle">
            <thead>
                <tr class="bg-light">
                    <th class="border-top-0">Uraian</th>
                    <th class="border-top-0">Jumlah</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="m-r-10">
                                <a class="btn btn-circle btn-danger text-white">SA</a>
                            </div>
                            <div class="">
                                <h4 class="m-b-0 font-16">Saldo awal {{ $filterYear }} </h4>
                            </div>
                        </div>
                    </td>
                    <td>
                        <h5 class="m-b-0">{{ Number::currency($beginningBalance,in:"IDR", locale:'id') }}</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="m-r-10">
                                <a class="btn btn-circle btn-info text-white">PT</a>
                            </div>
                            <div class="">
                                <h4 class="m-b-0 font-16">Pemasukan tahun {{ $filterYear }}</h4>
                            </div>
                        </div>
                    </td>
                 
                    <td>
                        <h5 class="m-b-0">{{ Number::currency($incomeThisPeriod,in:"IDR", locale:'id') }}</h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="m-r-10">
                                <a class="btn btn-circle btn-success text-white">PT</a>
                            </div>
                            <div class="">
                                <h4 class="m-b-0 font-16">Pengeluaran tahun {{ $filterYear }}</h4>
                            </div>
                        </div>
                    </td>
                   
                    <td>
                        <h5 class="m-b-0"> <h5 class="m-b-0">{{ Number::currency($expenseThisPeriod,in:"IDR", locale:'id') }}</h5></h5>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="m-r-10">
                                <a class="btn btn-circle btn-purple text-white">ST</a>
                            </div>
                            <div class="">
                                <h4 class="m-b-0 font-16">Saldo tahun {{ $filterYear }}</h4>
                            </div>
                        </div>
                    </td>
                  
                    <td>
                        <h5 class="m-b-0"> <h5 class="m-b-0">{{ Number::currency($balanceThisPeriod,in:"IDR", locale:'id') }}</h5></h5>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
  
    
</div>
