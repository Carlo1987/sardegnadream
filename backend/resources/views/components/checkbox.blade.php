@props([
    'value',
    'isChecked',
])

<label class="flex items-center gap-3">
    {{ $slot }}
    <input type="checkbox" name="chek_service[]" value="{{ $value }}" @checked($isChecked)>
</label>
