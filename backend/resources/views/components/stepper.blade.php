@props(['currentStep', 'steps'])

<div class="stepper relative flex flex-col md:flex-row items-center md:justify-between gap-3 md:gap-0 mt-6 p-3">

    {{-- Linea orizzontale --}}
    <div class="absolute top-1/2 left-[10%] w-4/5 h-0.5 bg-gray-300 hidden md:block"></div>
    {{-- Linea verticale --}}
    <div class="absolute left-1/2 top-[10%] h-4/5 w-0.5 bg-gray-300 block md:hidden"></div>

    @foreach($steps as $index => $step)
        <div class="relative flex-1 flex items-center md:justify-center">
            <div class="z-10 flex items-center justify-center w-auto p-3
                        rounded-full font-semibold
                        {{ $currentStep == $index + 1 ? 'bg-theme' : 'bg-gray-200 text-gray-700' }}">
                {{ $step }}
            </div>
        </div>
    @endforeach
</div>