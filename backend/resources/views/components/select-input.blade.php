@props(['options' => [], 'selected' => null])

<select {{ $attributes->merge(['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}>
    @foreach($options as $value => $label)
        <option value="{{ $value }}" @if($selected == $value) selected @endif>{{ $label }}</option>
    @endforeach
</select>
