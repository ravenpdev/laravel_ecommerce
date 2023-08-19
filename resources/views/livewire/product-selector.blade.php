<div class="space-y-6">
    @if ($initialVariations)
        <livewire:product-dropdown :variations="$initialVariations" />
    @endif

    @if ($skuVariant)
        <div class="space-y-6">
            <div class="text-lg font-semibold">{{ $skuVariant->formattedPrice() }}</div>

            <x-button wire:click.prevent="addToCart"
                class="rounded border border-gray-900 text-gray-900 hover:border-gray-900 hover:bg-gray-900 hover:text-white">Add
                to cart</x-button>
        </div>
    @endif
</div>
