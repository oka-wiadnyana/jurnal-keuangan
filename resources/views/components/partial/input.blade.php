@props(['labelName'=>'', 'inputType','inputName','inputId'=>'','inputValue'=>''])
 
<div class="form-group">
    <label for="">{{ $labelName }}</label>
   <input type="{{ $inputType }}" name="{{ $inputName }}" id="{{ $inputId }}" class="form-control" value="{{ $inputValue }}">
</div> 