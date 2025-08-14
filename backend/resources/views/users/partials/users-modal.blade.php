 <x-modal name="upsert-user-modal" focusable>
        <form method="post" action="{{ route('users.upsert') }}" class="p-6">
            @csrf

            <div class="mt-3">
                <x-input-label for="name" value="{{ __('profile.name') }}" class="text-lg" />

                <x-text-input
                    id="name"
                    name="name"
                    type="text"
                    class="mt-1 block w-full"
                />
            </div>

            <div class="mt-3">
                <x-input-label for="email" value="{{ __('profile.email') }}"  class="text-lg" />

                <x-text-input
                    id="email"
                    name="email"
                    type="email"
                    class="mt-1 block w-full"
                />
            </div>

            <div class="mt-3">
                <x-input-label for="role_id" :value="__('profile.role')" class="text-lg" />

                <x-select-input 
                    id="role_id" 
                    name="role_id"
                    :options="$roles"
                    :selected="old('role_id')"
                    class="w-4/4"
                />
            </div>


            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('common.cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3">
                    {{ __('common.save') }}
                </x-primary-button>
            </div>
        </form>
    </x-modal>