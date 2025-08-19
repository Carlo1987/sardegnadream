<button
    x-data="{ loading: false }"
    x-on:click="loading = true; $el.form.submit()"
    x-bind:disabled="loading"
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'btn-primary'
    ]) }}
>
    @include('components.spinner-button')
</button>
