@php
    $home_data = session('home_session');
@endphp

<x-app-layout>
    <x-stepper :currentStep="4" :steps="$steps" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form id="form" method="post" action="{{ route('home.postStep4') }}" class="p-6">
                        @csrf

                        <input type="hidden" name="id" id="id" value="{{ $home_data['id'] ?? null }}">

                        <div class="mb-4">
                            <x-input-label for="yearSelect" value="{{ __('home.select_year') }}:" class="text-xl mr-2" />

                            <x-select-input 
                                id="yearSelect" 
                                name="yearSelect"
                                class="block w-1/5"
                                :options="$years"
                            />
                        </div>

                <!--         <div class="mb-4 flex gap-2">
                            <div>
                                <x-input-label for="yearSelect" value="{{ __('Da') }}:" class="text-xl mr-2" />
                            </div>
                            <select id="startDay"></select>
                            <select id="startMonth"></select>
                            <select id="endDay"></select>
                            <select id="endMonth"></select>
                            <input type="number" id="priceInput" placeholder="Prezzo" class="border px-2 py-1 rounded">
                            <button id="addPrice" class="bg-theme px-3 py-1 rounded">Aggiungi</button>
                        </div>  -->

                        <div id='calendar'></div>
                      
                        <x-btns-stepper back_href="{{ route('home.step3') }}"/>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('homes.partials.modal-upsert-price')


<script>
    document.addEventListener('DOMContentLoaded', function () {
        fillInputs();
    });

    function fillInputs(){}
</script>
