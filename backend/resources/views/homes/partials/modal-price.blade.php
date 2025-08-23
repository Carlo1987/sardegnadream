
<div id="modalPrice" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-[9999] hidden">
  <div class="bg-white rounded-xl shadow-lg p-6 w-96">
    <h2 id="modalTitle" class="text-lg font-bold mb-4"> <!-- Settato con JS --> </h2>

    <p>
      <span class="text-red-500">{{ __('common.reset') }}</span>: {{ __('home.modalPrice_reset') }}
    </p>
     <p>
      <span class="text-sky-500">{{ __('common.confirm') }}</span>: {{ __('home.modalPrice_confirm') }}
    </p>
    
    <div class="flex justify-center gap-2 my-3">
        <label for="modalInput" class="pt-1 text-2xl font-medium text-gray-700"> € </label>
        <x-text-input 
            id="modalInput"
            type="number"
            class="block"
            placeholder="{{ __('common.price') }}"
        />
    </div>

    <div id="loading" class="bg-white bg-opacity-70 flex items-center justify-center rounded-xl z-50 hidden">
      <span class="text-gray-800 mr-2"> {{ __('common.loading') }}... </span>
    </div>

    <div id="error" class="text-red-500 my-3 hidden">
      {{ __('home.modalPrice_error') }}
    </div>
   
    <div class="mt-3 flex justify-end gap-2">
      <button id="modalCancel" class="px-4 py-2 bg-gray-200 rounded"> {{ __('common.back') }} </button>
      <button id="modalClear" class="px-4 py-2 bg-red-500 text-white rounded"> {{ __('common.reset') }} </button>
      <button id="modalConfirm" class="px-4 py-2 bg-theme rounded"> {{ __('common.confirm') }} </button>
    </div>
  </div>
</div>
