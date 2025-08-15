@props([
    'modal' => null, 
    'label',         
])

<button 
    type="submit" 
    class="btn-add-modal w-48 px-2 py-1 bg-theme text-center rounded flex justify-center gap-1 cursor-pointer"
    x-data=""
    @if($modal)
        x-on:click.prevent="$dispatch('open-modal', '{{ $modal }}')"
    @endif
>
    @include('components.svg.add-icon')
    {{ $label }}
</button>
