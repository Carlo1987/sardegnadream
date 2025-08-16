@props([
    'modal' => null, 
    'href' => null,
    'label',         
])

<button 
    type="submit" 
    class="btn-add-modal w-48 px-2 py-1 bg-theme text-center rounded cursor-pointer"
    x-data=""
    @if($modal)
        x-on:click.prevent="$dispatch('open-modal', '{{ $modal }}')"
    @endif
>
    <a href="{{ $href }}" class="flex justify-center gap-1">
        @include('components.svg.add-icon')
        {{ $label }}
    </a>
</button>
