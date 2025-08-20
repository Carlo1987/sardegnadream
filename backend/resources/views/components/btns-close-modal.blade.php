@props(['action'])

<div class="btn-close-modal mt-6 flex justify-end">
    <x-secondary-button x-on:click="$dispatch('close')">
        {{ __('common.cancel') }}
    </x-secondary-button>

    @if($action == 'upsert')
    <x-primary-button class="ms-3">
        {{ __('common.save') }}
    </x-primary-button>
    @else
    <x-danger-button class="ms-3">
        {{ __('common.delete') }}
    </x-danger-button>
    @endif
</div>


<script>
    document.addEventListener('DOMContentLoaded', function (){
        closeModal();
    });
</script>