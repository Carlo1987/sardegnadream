<button
    x-data="{ loading: false }"
    x-on:click="loading = true; $el.form.submit()"
    x-bind:disabled="loading"
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'bg-theme inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'
    ]) }}
>
    @include('components.spinner-button')
</button>
