<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductImages extends Component
{

    public Product $product;

    public $selectedImageUrl;

    public function mount()
    {
        $this->selectedImageUrl = $this->product->getFirstMediaUrl();
    }

    public function selectImage($url)
    {
        $this->selectedImageUrl = $url;
    }

    public function render()
    {
        return view('livewire.product-images');
    }
}
