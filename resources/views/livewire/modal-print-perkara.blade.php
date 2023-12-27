<x-partial.modal :show="$show">
    <x-slot:formTitle>
        Print Register
    </x-slot:formTitle>
    <x-partial.form formRoute="perkara.print">
        <x-partial.select-input selectName="month" :selectValue=$month selectLabel="Bulan" selectPlaceHolder="Bulan" optValue='id' optText='name' />
        
        <x-partial.select-input selectName="year" :selectValue=$year selectPlaceHolder="Tahun" optValue='name' optText='name' selectLabel="Tahun"/>
       
        <x-partial.input inputName="city" inputType="text" labelName="Kota" />
        <x-partial.input inputName="reportDate" inputType="date" labelName="Tgl Laporan" />
        <x-partial.button buttonType="submit" buttonText="Simpan" class="btn btn-primary"/>
        <x-partial.button-close-modal/>
    </x-partial.form>

</x-partial.modal>