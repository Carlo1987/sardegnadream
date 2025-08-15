<x-modal name="delete-user-modal" focusable>

    <x-title-description-modal action="delete"/>

    <form id="form" method="post" action="{{ route('users.destroy') }}" class="p-6">
        @csrf
        @method('delete')

        <input type="hidden" name="id" id="delete-id">

        <x-text-input
            id="delete-name"
            name="name"
            type="text"
            class="mt-1 block w-full"
            readonly
        />

        <x-btns-close-modal action="delete"/>

    </form>
</x-modal>
