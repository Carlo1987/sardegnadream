@props([
    'role_id' => null,
    'object', 
    'modal',
    'dataFields' => [],
])

@php
    $isAdmin = $role_id && $role_id === App\Enums\RolesEnum::ADMIN->value;

    $dataAttributes = collect($dataFields)
        ->mapWithKeys(fn($field) => ["data-{$field}" => $object->{$field} ?? ''])
        ->toArray();
@endphp

<button 
    type="submit" 
    title="{{ $isAdmin ? __('profile.adminNoDeleteble') : __('common.delete') }}"
    @class([
        'btn-delete-modal inline-block p-2 text-white text-center rounded cursor-pointer bg-red-500',
        'opacity-50 cursor-not-allowed' => $isAdmin
    ])
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', '{{ $modal }}')"
    @if($isAdmin) disabled @endif
    @foreach($dataAttributes as $attr => $value)
        {{ $attr }}="{{ $value }}"
    @endforeach
>
    @include('components.svg.delete-icon')
</button> 