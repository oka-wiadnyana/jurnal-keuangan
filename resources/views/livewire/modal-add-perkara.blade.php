<x-partial.modal :show="$show">
    <x-slot:formTitle>
        Tambah Keuangan Perkara
    </x-slot:formTitle>
    <x-partial.form formRoute="perkara.insert">
        <x-partial.input labelName="Tanggal" inputType="date" inputName="transaction_date" />
        <x-partial.input labelName="Nomor perkara" inputType="text" inputName="case_number" />
        <x-partial.select-input selectLabel="Jenis transaksi" selectName="transaction_ref_id" :selectValue="$transactionRef" optValue="id" optText="transaction_name" secondOptText="transaction_sub_name" />
        
        <x-partial.input labelName="Jumlah" inputType="number" inputName="transaction_amount" />
        
      
        <x-partial.button buttonType="submit" buttonText="Simpan" class="btn btn-primary"/>
        <x-partial.button-close-modal/>
    </x-partial.form>

</x-partial.modal>