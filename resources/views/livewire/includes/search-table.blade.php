<div class="flex w-full">
    <div class="relative w-full md:w-96">
        <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
            <i class="fa-solid fa-search text-neutral-600"></i>
        </div>
        <input wire:model.live.debounce.300ms="search" type="text"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-12 p-3"
            placeholder="{{ $placeholder ?? 'Cari...' }}">
    </div>
</div>
