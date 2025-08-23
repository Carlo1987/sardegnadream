@php
    $home_data = session('home_session');
@endphp

<x-app-layout>
    <x-stepper :currentStep="4" :steps="$steps" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <h2 class="text-xl font-bold"> {{ __('home.select_days') }} </h2>

                <p class="text-lg"> {{ __('home.days_noPrice') }} </p>
                    
                    <form id="form" method="post" action="{{ route('home.postStep4') }}" class="p-6">
                        @csrf

                         <x-btns-stepper back_href="{{ route('home.step3') }}"/>

                        <input type="hidden" name="id" id="id" value="{{ $home_data['id'] ?? null }}">

                        <input type="hidden" name="home_prices" id="home_prices">


                        <div class="mb-4 flex justify-center gap-4">
                            <div>
                                <x-input-label for="yearSelect" value="{{ __('home.select_year') }}:" class="text-xl mr-2" />
                                <x-select-input 
                                    id="yearSelect" 
                                    name="yearSelect"
                                    class="block w-48"
                                    :options="$years"
                                />
                            </div>
                            <div>
                                 <div>
                                    <x-input-label for="monthSelect" value="{{ __('home.select_month') }}:" class="text-xl mr-2" />
                                    <x-select-input 
                                        id="monthSelect" 
                                        name="monthSelect"
                                        class="block w-48"
                                        :options="$months"
                                    />
                                </div>
                            </div>
                        </div>

                        <div id='calendar'></div>
                      
                       

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('homes.partials.modal-price')

<script>
    document.getElementById('form').addEventListener('submit', function(e){
        document.getElementById('home_prices').value = JSON.stringify(home_prices);
    });
</script>


