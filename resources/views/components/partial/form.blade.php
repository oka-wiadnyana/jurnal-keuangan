@props(['formRoute'])

<form action="{{ route($formRoute) }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{ $slot }}
</form>