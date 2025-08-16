@php
    $home_data = session('home_session');
@endphp

<x-app-layout>
    <x-stepper :currentStep="1" :steps="$steps" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <form id="form" method="post" action="{{ route('home.postStep1') }}" class="p-6">
                        @csrf

                        <input type="hidden" name="id" id="id" value="{{ $home_data['id'] ?? null }}">

                        <div class="mt-3 grid grid-cols-1 md:grid-cols-4 gap-3">
                            <div class="md:col-span-2">
                                <x-input-label for="name" value="{{ __('home.name') }}" class="text-lg" />

                                <x-text-input
                                    id="name"
                                    name="name"
                                    type="text"
                                    class="block w-full"
                                    value="{{ $home_data['name'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div class="col-span-1">
                                <x-input-label for="province" value="{{ __('home.province') }}"  class="text-lg" />

                                <x-text-input
                                    id="province"
                                    name="province"
                                    type="text"
                                    class="block w-full"
                                    value="{{ $home_data['province'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('province')" />
                            </div>
                            <div class="col-span-1">
                                <x-input-label for="state" value="{{ __('home.state') }}"  class="text-lg" />

                                <x-select-input 
                                    id="state" 
                                    name="state"
                                    class="block"
                                    :options="$states"
                                    :selected="$home_data['state'] ?? 'IT'"
                                />
                            </div>
                        </div>
       
                        <div class="mt-3 grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-6 gap-3">
                            <div class="sm:col-span-2">
                                <x-input-label for="city" value="{{ __('home.city') }}"  class="text-lg" />

                                <x-text-input
                                    id="city"
                                    name="city"
                                    type="text"
                                    class="mt-1 block w-full"
                                    value="{{ $home_data['city'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('city')" />
                            </div>
                            <div class="col-span-1">
                                <x-input-label for="cap" value="{{ __('home.cap') }}"  class="text-lg" />

                                <x-text-input
                                    id="cap"
                                    name="cap"
                                    type="text"
                                    class="mt-1 block w-full"
                                    value="{{ $home_data['cap'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('cap')" />
                            </div>
                            <div class="sm:col-span-2">
                                <x-input-label for="address" value="{{ __('home.address') }}"  class="text-lg" />

                                <x-text-input
                                    id="address"
                                    name="address"
                                    type="text"
                                    class="mt-1 block w-full"
                                    value="{{ $home_data['address'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>
                            <div class="col-span-1">
                                <x-input-label for="civ" value="{{ __('home.civ') }}"  class="text-lg" />

                                <x-text-input
                                    id="civ"
                                    name="civ"
                                    type="text"
                                    class="mt-1 block w-full"
                                    value="{{ $home_data['civ'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('civ')" />
                            </div>
                        </div>
            
                        <div class="mt-3">
                            <x-input-label for="description" value="{{ __('home.description') }}"  class="text-lg" />

                            <x-textarea
                                id="description"
                                name="description"
                                class="mt-1 block w-full"
                            >
                                {{ $home_data['description'] ?? '' }}
                            </x-textarea>

                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <x-btns-stepper />
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
