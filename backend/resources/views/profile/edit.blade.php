<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('profile.profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="w-full md:flex gap-6">
                <div class="p-4 sm:p-8 w-full md:w-1/2 bg-white shadow sm:rounded-lg mb-6 md:mb-0">
                    @include('profile.partials.update-profile-information-form')
                </div>

                <div class="p-4 sm:p-8 w-full md:w-1/2 bg-white shadow sm:rounded-lg">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
