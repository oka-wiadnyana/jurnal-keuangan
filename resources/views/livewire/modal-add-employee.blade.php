<x-partial.modal :show="$show">
    <x-slot:formTitle>
        {{ $employeeData?"Edit":"Tambah" }} Pejabat
    </x-slot:formTitle>
    <x-partial.form formRoute="reference.insert_employee">
        
        <x-partial.select-input selectLabel="Tahun" selectName="department" :selectValue="$department" optValue="value" optText="value" :optUpdateValue="$employeeData?->department"/>
        
        <x-partial.input labelName="Nama" inputType="text" inputName="name" :inputValue="$employeeData?->name"/>
        <x-partial.input labelName="NIP" inputType="text" inputName="nip" :inputValue="$employeeData?->nip"/>
        <x-partial.plain-input  inputType="hidden" inputName="id" :inputValue="$employeeData?->id"/>
        
      
        <x-partial.button buttonType="submit" buttonText="Simpan" class="btn btn-primary"/>
        <x-partial.button-close-modal/>
    </x-partial.form>

</x-partial.modal>