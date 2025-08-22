
<div id="upsertPriceModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-[9999] hidden">
  <div class="bg-white rounded-xl shadow-lg p-6 w-96">
    <h2 id="modalTitle" class="text-lg font-bold mb-4">Imposta prezzo</h2>
    
    <x-text-input 
        id="modalInput"
        type="number"
        class="block w-full"
        placeholder="Prezzo"
    />
   
    <div class="mt-3 flex justify-end gap-2">
      <button id="modalCancel" class="px-4 py-2 bg-gray-200 rounded">Annulla</button>
      <button id="modalConfirm" class="px-4 py-2 bg-theme rounded">Conferma</button>
    </div>
  </div>
</div>
