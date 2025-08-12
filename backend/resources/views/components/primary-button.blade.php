<button
    x-data="{ loading: false }"
    x-on:click="loading = true; $el.form.submit()"
    x-bind:disabled="loading"
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'bg-theme inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'
    ]) }}
>
    <template x-if="loading">
        <svg class="mr-3 h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
        </svg>
    </template>

    <span x-show="!loading">
        {{ $slot }}
    </span>

    <span x-show="loading" style="display: none;">
        {{ $loadingText ?? __('common.loading') }}
    </span>
</button>
