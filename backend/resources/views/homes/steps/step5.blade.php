@php
    $home_data = session('home_session');
@endphp

<x-app-layout>
    <x-stepper :currentStep="5" :steps="$steps" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form id="form" method="post" action="{{ route('homes.upsert') }}" enctype="multipart/form-data" class="p-6">
                        @csrf

                        <input type="hidden" name="id" id="id" value="{{ $home_data['id'] ?? null }}">

                        <div class="mb-4 grid grid-cols-1 sm:grid-cols-2">
                            <x-input-label for="avatar" value="{{ __('home.select_avatar') }}" class="text-lg col-span-1" />

                            <x-btn-files name="avatar" class="col-span-1">
                                {{ __('common.select_image') }}  
                            </x-btn-files>

                            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                        </div>

                        <div class="mb-4 grid grid-cols-1 sm:grid-cols-2">
                            <x-input-label for="avatar" value="{{ __('home.select_images') }}" class="text-lg col-span-1" />

                            <x-btn-files name="images" isMultiple=true class="col-span-1">
                                {{ __('common.select_images') }}  
                            </x-btn-files>

                            <x-input-error class="mt-2" :messages="$errors->get('images')" />
                        </div>

                          <div class="mb-4 grid grid-cols-1 sm:grid-cols-2">
                            <x-input-label for="avatar" value="{{ __('home.select_videos') }}" class="text-lg col-span-1" />

                            <x-btn-files name="videos" isMultiple=true type="video"  class="col-span-1">
                                {{ __('common.select_videos') }}  
                            </x-btn-files>

                            <x-input-error class="mt-2" :messages="$errors->get('videos')" />
                        </div>
                      

                        <x-btns-stepper back_href="{{ route('home.step4') }}"/>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
