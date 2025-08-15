<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('profile.manageUsers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-end mb-4">
                        <x-btn-add label="{{ __('profile.addUser') }}" modal="upsert-user-modal" />
                    </div>
             
                   @if($users->count() > 0)
                    @include('users.partials.users-table')
                   @else
                    <div class="w-64 m-auto bg-gray-100 p-2 border border-grey-400 text-center rounded">
                    {{ __('profile.noUsers') }}
                    </div>
                   @endif
                </div>
            </div>
        </div>
    </div>
    @include('users.partials.users-upsert-modal')
    @include('users.partials.users-delete-modal')
</x-app-layout>


<script>
    document.addEventListener('DOMContentLoaded', function (){

        const dataToAdd = {
            texts : {
                title : "{{  __('profile.addUser') }}",
                description : "{{ __('profile.addUser_alert') }}",
            },
            data : [],
        }

        setModalAddItem(dataToAdd);
    });
</script>