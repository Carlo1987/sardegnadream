@props([
    'action' => null,
    'back_href' => null
    ])

<div class="btn-close-modal mt-6 flex justify-end">
    <x-btn-back href="{{ $back_href }}">
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