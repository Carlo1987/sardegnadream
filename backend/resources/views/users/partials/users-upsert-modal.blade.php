<x-modal name="upsert-user-modal" :show="$errors->upsertUser->isNotEmpty()" focusable>

    <x-title-description-modal action="upsert"/>

    <form id="form" method="post" action="{{ route('users.upsert') }}" class="p-6">
        @csrf

        <input type="hidden" name="id" id="id">

        <div class="mt-3">
            <x-input-label for="name" value="{{ __('profile.name') . ' ' . __('common.user') }}" class="text-lg" />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
            />

            <x-input-error class="mt-2" :messages="$errors->upsertUser->get('name')" />
        </div>

        <div class="mt-3">
            <x-input-label for="email" value="{{ __('profile.email') . ' ' . __('common.user') }}"  class="text-lg" />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
            />

            <x-input-error class="mt-2" :messages="$errors->upsertUser->get('email')" />
        </div>

        <div class="mt-3">
            <div class="flex items-center justify-start gap-2">
                <x-input-label for="role_id" :value="__('profile.role') . ' ' . __('common.user')" class="text-lg" />
                @include('components.roles-info')
            </div>


            <x-select-input 
                id="role_id" 
                name="role_id"
                :options="$rolesSelect"
                class="w-4/4"
            />
        </div>

        <x-btns-close-modal action="upsert"/>

    </form>
</x-modal>
