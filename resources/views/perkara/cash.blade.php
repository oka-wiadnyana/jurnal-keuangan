<x-layout.main>
    <x-slot:page_title>
        Keuangan Perkara {{ Request::segment(2)==1?"Masuk":"Keluar" }} 
    </x-slot:page_title>
<div class="row bg-white p-3">
    <div class="row mb-2">
        <div class="col">
            <x-partial.button buttonType="button" buttonText="Tambah" class="btn btn-primary" onclick="showModalAdd('show-modal-perkara',{{ $type }}); return false"></x-partial.button>
            <x-partial.button buttonType="button" buttonText="Print" class="btn btn-success" onclick="showModalAdd('show-modal-print-perkara'); return false"></x-partial.button>
           
        </div>
    </div>
    <div class="table-responsive">
        <table id="table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Nama transaksi</th>
                    <th>Jenis transaksi</th>
                    <th>Jumlah transaksi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>

        </table>
    </div>

</div>
<livewire:modal-add-perkara />
<livewire:modal-edit-perkara />
<livewire:modal-print-perkara />

@push('foot')

        <script>
            $(function() {

                var table = $('#table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('get_data_perkara_in/'.$type) }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'transaction_date',
                            name: 'transaction_date'
                        },
                        {
                            data: 'transaction_name',
                            name: 'transaction_name'
                        },
                        {
                            data: 'transaction_type',
                            name: 'transaction_type'
                        },
                        {
                            data: 'transaction_amount',
                            name: 'transaction_amount'
                        },

                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                    ]
                });

            });

         
        </script>
        <script src="{{ asset('myjs/func.js') }}"></script>
    @endpush

</x-layout.main>