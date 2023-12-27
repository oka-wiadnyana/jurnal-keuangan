<x-layout.main>
    <x-slot:page_title>
        Referensi Pejabat 
    </x-slot:page_title>
<div class="row bg-white p-3">
    <div class="row mb-2">
        <div class="col">
            <x-partial.button buttonType="button" buttonText="Tambah" class="btn btn-primary" onclick="showModalAdd('show-modal-add-employee'); return false"></x-partial.button>
          
           
        </div>
    </div>
    <div class="table-responsive">
        <table id="table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                  
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Jabatan</th>
                   
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            </tbody>

        </table>
    </div>

</div>
<livewire:modal-add-employee />
{{-- <livewire:modal-edit-perkara /> --}}
{{-- <livewire:modal-print-perkara /> --}}

@push('foot')

        <script>
            $(function() {

                var table = $('#table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('get_data_employee') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'nip',
                            name: 'nip'
                        },
                     
                        {
                            data: 'department',
                            name: 'department'
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