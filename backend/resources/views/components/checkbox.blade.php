@props([
    'value',
    'isChecked',
    'image',
])

<div class="flex items-center gap-3 mb-1">
    <div class="w-2/3 flex justify-start items-center gap-3">
        <img src="{{ asset('storage/icons/' . $image) }}" alt="icon_{{ $image }}" class="w-5">
        <label>
            {{ $slot }}
        </label>
    </div>
    <div class="w-1/3 justify-start items-center">
        <input type="checkbox" name="check_services[]" value="{{ $value }}" @checked($isChecked)>
    </div>
</div>