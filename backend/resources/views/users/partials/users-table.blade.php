<table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ __('profile.name') }}
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ __('profile.email') }}
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ __('profile.role') }}
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ __('common.actions') }}
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($users as $user)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $user->role()->name() }}</td>
            <td class="px-6 py-4 flex justify-start gap-2">
                <x-btn-edit 
                    :object="$user" 
                    :dataFields="['id', 'name', 'email','role_id']" 
                    modal="upsert-user-modal" 
                />
                <x-btn-delete 
                    :role_id="$user->role_id"
                    :object="$user" 
                    :dataFields="['id', 'name']" 
                    modal="delete-user-modal" 
                />
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    document.addEventListener('DOMContentLoaded', function (){

        const dataToEdit = {
            texts : {
                title : "{{  __('profile.editUser') }}",
                description : "{{ __('profile.editUser_alert') }}",
            },
            data : [
                { data : 'id' },
                { data : 'name' },
                { data : 'email' },
                { data : 'role_id' },
            ],
        }

        const dataToDelete = {
            texts : {
                title : "{{  __('profile.deleteUser') }}",
                description : "{{ __('profile.deleteUser_alert') }}",
            },
            data : [
                { data : 'id', input : 'delete-id' },
                { data : 'name', input : 'delete-name' },
            ]
        }

        setModalEditItem(dataToEdit);
        setModalDeleteItem(dataToDelete);
    });
</script>