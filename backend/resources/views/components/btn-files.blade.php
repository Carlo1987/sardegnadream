@props([
    'name',
    'id',
    'isMultiple' => false,
    'type' => 'image',
    ])

<div>
    <input type="hidden">
    <input class="hidden" type="file" id="{{ $id }}" name="{{ $name }}" accept="{{ $type }}/*" @if($isMultiple) multiple @endif>
    <button type="button" class="btn-secondary" onclick="document.querySelector('#{{ $id }}').click()" id="btn_{{ $id }}"> 
       {{ $slot }}
    </button>  
</div>


<script>
    document.addEventListener('DOMContentLoaded', function (){
        const file_id = "{{ $id }}";
        const type = "{{ $type }}";
        setStyleBtnFile(file_id, type);
    });
</script>
