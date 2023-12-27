<x-partial.modal :show="$show">
    <x-slot:formTitle>
        Edit Keuangan Perkara
    </x-slot:formTitle>
    <x-partial.form formRoute="perkara.insert">
        <x-partial.input labelName="Tanggal" inputType="date" inputName="transaction_date" :inputValue="$data?->transaction_date"/>
        <x-partial.input labelName="Nomor perkara" inputType="text" inputName="case_number" :inputValue="$data?->case_number"/>
        <x-partial.select-input selectLabel="Jenis transaksi" selectName="transaction_ref_id" :selectValue="$transactionRef" optValue="id" optText="transaction_name" secondOptText="transaction_sub_name" :optUpdateValue="$data?->transaction_ref_id"/>
       
        <x-partial.input labelName="Jumlah" inputType="number" inputName="transaction_amount" :inputValue="$data?->transaction_amount"/>
            <x-partial.plain-input inputType="hidden" inputName="id" :inputValue="$data?->id"/>
      
        <x-partial.button buttonType="submit" buttonText="Simpan" class="btn btn-primary"/>
        <x-partial.button-close-modal/>
    </x-partial.form>

</x-partial.modal>