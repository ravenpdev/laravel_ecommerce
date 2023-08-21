<?php

namespace App\Http\Livewire;

use App\Services\Cart\CartService;
use Livewire\Component;

class Navigation extends Component
{
    public function getCartProperty(CartService $cart)
    {
        return $cart;
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
