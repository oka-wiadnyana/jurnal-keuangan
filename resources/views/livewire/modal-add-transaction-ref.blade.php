<x-partial.modal :show="$show">
    <x-slot:formTitle>
        {{ $data?"Edit":"Tambah" }} Akun Transaksi
    </x-slot:formTitle>
    <x-partial.form formRoute="reference.insert_transaction_reference">
        
        <x-partial.select-input selectLabel="Jenis transaksi" selectName="transaction_name" :selectValue="$selectAccount" optValue="value" optText="value" :optUpdateValue="$data?->transaction_name"/>
        
        <x-partial.input labelName="Sub Transaksi" inputType="text" inputName="transaction_sub_name" :inputValue="$data?->transaction_sub_name"/>
        <x-partial.plain-input  inputType="hidden" inputName="id" :inputValue="$data?->id"/>
        
      
        <x-partial.button buttonType="submit" buttonText="Simpan" class="btn btn-primary"/>
        <x-partial.button-close-modal/>
    </x-partial.form>

</x-partial.modal>