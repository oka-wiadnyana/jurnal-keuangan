<x-partial.modal :show="$show">
    <x-slot:formTitle>
        {{ $balanceData?"Edit":"Tambah" }} Saldo Awal
    </x-slot:formTitle>
    <x-partial.form formRoute="reference.insert_balance">
        
        <x-partial.select-input selectLabel="Tahun" selectName="year" :selectValue="$years" optValue="value" optText="value" :optUpdateValue="$balanceData?->year"/>
        
        <x-partial.input labelName="Jumlah" inputType="number" inputName="balance" :inputValue="$balanceData?->balance"/>
        <x-partial.plain-input  inputType="hidden" inputName="id" :inputValue="$balanceData?->id"/>
        
      
        <x-partial.button buttonType="submit" buttonText="Simpan" class="btn btn-primary"/>
        <x-partial.button-close-modal/>
    </x-partial.form>

</x-partial.modal>