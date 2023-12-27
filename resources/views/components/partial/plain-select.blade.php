@props(['selectName','selectId'=>'','selectValue','optValue','optText', 'optUpdateValue'=>"", 'selectPlaceHolder'=>''])


    
  <select name="{{ $selectName }}" id="{{ $selectId }}" class="form-control" {{ $attributes }}>
    <option value="" selected disabled>Pilih {{ $selectPlaceHolder }}</option>
    @foreach ($selectValue->toArray() as $value)
        <option value="{{ $value[$optValue] }}" @selected($value[$optValue]==$optUpdateValue)>{{ $value[$optText] }}</option>
    @endforeach
  </select>
