@props([
    'action' => null
    ])

<div class="btn-close-modal mt-6 flex justify-end">
    <x-btn-back>
        {{ __('common.back') }}
    </x-btn-back>

    @if($action && $action == 'save' )
    <x-primary-button class="ms-3" type="submit">
        {{ __('common.save') }}
    </x-primary-button>
    @else
    <x-primary-button class="ms-3" type="submit">
        {{ __('common.next') }}
    </x-primary-button>
    @endif
</div>