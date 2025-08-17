@php
    $home_data = session('home_session');


@endphp

<x-app-layout>
    <x-stepper :currentStep="3" :steps="$steps" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                <form id="form" method="post" action="{{ route('home.postStep3') }}" class="p-6">
                        @csrf

                        <input type="hidden" name="id" id="id" value="{{ $home_data['id'] ?? null }}">

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                            @foreach($home_services as $category => $services)
                            <div class="mb-4 col-span-1 text-center">
                                <h3 class="text-lg font-bold mb-2">{{ $category }}</h3>
                                <ul>
                                    @foreach($services as $key => $service)
                                        <li> 
                                            <x-checkbox  value="{{ $key }}" isChecked="{{ $service['value'] }}" image="{{ $service['image'] }}">
                                                {{ $service['name'] }}
                                            </x-checkbox>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endforeach
                        </div>

                        <x-btns-stepper back_href="{{ route('home.step2') }}"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
