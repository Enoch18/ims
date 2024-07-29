@props(['items'])

@if(count($items) == 0)
    <p class="text-md p-2 text-center">No Items Found</p>
@endif