<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Variation;
use App\Services\Cart\CartService;
use Livewire\Component;

class ProductSelector extends Component
{
    public Product $product;

    /**
    * @var \Staudenmeir\LaravelAdjacencyList\Eloquent\Collection<array-key, \App\Models\Variation>|null $initialVariations
    */
    public $initialVariations;

    public ?Variation $skuVariant;

    protected $listeners = [
        'skuVariantSelected'
    ];

    public function mount(): void
    {
        $this->initialVariations = $this->product->variations->sortBy('order')->groupBy('type')->first();
    }

    public function skuVariantSelected($variantId)
    {
        if (!$variantId) {
            $this->skuVariant = null;
            return;
        }

        $this->skuVariant = Variation::find($variantId);
    }

    public function addToCart(CartService $cartService)
    {
        $cartService->add($this->skuVariant, 1);
    }

    public function render()
    {
        return view('livewire.product-selector');
    }
}
