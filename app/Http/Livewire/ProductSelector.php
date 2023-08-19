<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Variation;
use Livewire\Component;

class ProductSelector extends Component
{
    public Product $product;

    public $initialVariations;

    public $skuVariant;

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

    public function addToCart()
    {
        dd($this->skuVariant);
    }

    public function render()
    {
        return view('livewire.product-selector');
    }
}
