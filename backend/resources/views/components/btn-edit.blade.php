@props([
    'object', 
    'modal',
    'dataFields' => [],
])

@php
    $dataAttributes = collect($dataFields)
        ->mapWithKeys(fn($field) => ["data-{$field}" => $object->{$field} ?? ''])
        ->toArray();
@endphp

<button 
    type="submit" 
    title="{{ __('common.edit') }}"
    class="btn-edit-modal inline-block p-2 bg-theme text-center rounded cursor-pointer"
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', '{{ $modal }}')"
    @foreach($dataAttributes as $attr => $value)
        {{ $attr }}="{{ $value }}"
    @endforeach
>
    @include('components.svg.update-icon')
</button>