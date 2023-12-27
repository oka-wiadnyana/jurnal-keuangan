@props(['buttonType','buttonText','onClick'=>''])

<button {{ $attributes }} type="{{ $buttonType }}" onclick="{{ $onClick }}">{{ $buttonText }}</button>