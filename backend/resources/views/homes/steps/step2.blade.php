@php
    $home_data = session('home_session');
@endphp

<x-app-layout>
    <x-stepper :currentStep="2" :steps="$steps" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <form id="form" method="post" action="{{ route('home.postStep2') }}" class="p-6">
                        @csrf

                        <input type="hidden" name="id" id="id" value="{{ $home_data['id'] ?? null }}">

                        <div class="mt-3 grid grid-cols-2 sm:grid-cols-4 gap-3">
                            <div class="col-span-1">
                                <x-input-label for="meters" value="{{ __('home.meters') }}" class="text-lg" />

                                <x-text-input
                                    id="meters"
                                    name="meters"
                                    type="text"
                                    class="block w-full"
                                    value="{{ $home_data['meters'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('meters')" />
                            </div>
                            <div class="col-span-1">
                                <x-input-label for="rooms" value="{{ __('home.rooms') }}"  class="text-lg" />

                                <x-text-input
                                    id="rooms"
                                    name="rooms"
                                    type="text"
                                    class="block w-full"
                                    value="{{ $home_data['rooms'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('rooms')" />
                            </div>
                            <div class="col-span-1">
                                <x-input-label for="bathrooms" value="{{ __('home.bathrooms') }}"  class="text-lg" />

                                <x-text-input
                                    id="bathrooms"
                                    name="bathrooms"
                                    type="text"
                                    class="block w-full"
                                    value="{{ $home_data['bathrooms'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('bathrooms')" />
                            </div>
                            <div class="col-span-1">
                                <x-input-label for="single_beds" value="{{ __('home.single_beds') }}"  class="text-lg" />

                                <x-text-input
                                    id="single_beds"
                                    name="single_beds"
                                    type="text"
                                    class="mt-1 block w-full"
                                    value="{{ $home_data['single_beds'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('single_beds')" />
                            </div>
                        </div>
       
                        <div class="mt-3 grid grid-cols-2 sm:grid-cols-4 gap-3">
                            
                            <div class="col-span-1">
                                <x-input-label for="double_beds" value="{{ __('home.double_beds') }}"  class="text-lg" />

                                <x-text-input
                                    id="double_beds"
                                    name="double_beds"
                                    type="text"
                                    class="mt-1 block w-full"
                                    value="{{ $home_data['double_beds'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('double_beds')" />
                            </div>
                            <div class="col-span-1">
                                <x-input-label for="bunk_beds" value="{{ __('home.bunk_beds') }}"  class="text-lg" />

                                <x-text-input
                                    id="bunk_beds"
                                    name="bunk_beds"
                                    type="text"
                                    class="mt-1 block w-full"
                                    value="{{ $home_data['bunk_beds'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('bunk_beds')" />
                            </div>
                            <div class="col-span-1">
                                <x-input-label for="wall_beds" value="{{ __('home.wall_beds') }}"  class="text-lg" />

                                <x-text-input
                                    id="wall_beds"
                                    name="wall_beds"
                                    type="text"
                                    class="mt-1 block w-full"
                                    value="{{ $home_data['wall_beds'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('wall_beds')" />
                            </div>
                            <div class="col-span-1">
                                <x-input-label for="sofa_beds" value="{{ __('home.sofa_beds') }}"  class="text-lg" />

                                <x-text-input
                                    id="sofa_beds"
                                    name="sofa_beds"
                                    type="text"
                                    class="mt-1 block w-full"
                                    value="{{ $home_data['sofa_beds'] ?? '' }}"
                                />

                                <x-input-error class="mt-2" :messages="$errors->get('sofa_beds')" />
                            </div>
                        </div>
            
                        <x-btns-stepper />

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
