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
            <td class="px-6 py-4 whitespace-nowrap">{{ $user->role()->name }}</td>
            <td class="px-6 py-4 flex justify-center gap-2">
                <div class="inline-block p-2 bg-theme text-center rounded cursor-pointer">
                    @include('components.svg.update-icon')
                </div>
                <div class="inline-block p-2 bg-red-300 text-center rounded cursor-pointer">
                   @include('components.svg.delete-icon')
                </div>  
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
