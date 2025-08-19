@props([
    'name',
    'isMultiple' => false,
    'type' => 'image',
    ])

<div>
    <input type="hidden">
    <input class="hidden" type="file" id="{{ $name }}" name="{{ $name }}" accept="{{ $type }}/*" @if($isMultiple) multiple @endif>
    <button type="button" class="btn-secondary" onclick="document.querySelector('#{{ $name }}').click()" id="btn_{{ $name }}"> 
       {{ $slot }}
    </button>  
</div>


<script>
    document.addEventListener('DOMContentLoaded', function (){
        const file_name = "{{ $name }}";
        const type = "{{ $type }}";
        setStyleBtnFile(file_name, type);
    });
</script>
