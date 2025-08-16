@props(['roles'])

<button 
    type="button" 
    title="{{__('common.info')}}"
    x-data=""
    x-on:click.prevent="$dispatch('open-modal', 'roles-info-modal')"
> 
    @include('components.svg.info-icon')
</button>


<x-modal name="roles-info-modal" focusable>

    <h2 class="h2-modal">
       {{  __('profile.roles') }}
    </h2>

    @foreach ($roles as $role)
        <div class="mt-6 p-6 flex align-start">
            <p class="flex-1 text-lg text-gray-600 font-bold">
                {{ $role['name'] }}:
            </p>

            <div class="flex flex-col flex-4 gap-2">
                @foreach($role['description'] as $key => $row)
                    <p class="text-md text-gray-600">
                       {{ $key + 1 }} -  {{ $row }}
                    </p>
                @endforeach
            </div>
        </div>
    @endforeach

    <div class="m-6 flex justify-end">
        <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('Ok') }}
        </x-secondary-button>
    </div>
    
</x-modal>