@props(['currentStep', 'steps'])

<div class="stepper flex space-x-4 mt-6">
    @foreach($steps as $index => $step)
        <div class="step flex-1 text-center p-2 rounded
                    {{ $currentStep == $index + 1 ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' }}">
            {{ $step }}
        </div>
    @endforeach
</div>

