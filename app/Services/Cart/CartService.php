<?php

namespace App\Services\Cart;

use App\Models\Cart;
use App\Models\User;
use App\Models\Variation;
use Illuminate\Session\SessionManager;

class CartService
{
    protected ?Cart $instance = null;

    public function __construct(protected SessionManager $session) { }

    public function exists()
    {
        return $this->session->has(config('cart.session.key'));
    }

    public function create(?User $user = null)
    {

        $cart = Cart::make();

        if ($user) {
            $cart->user()->associate($user);
        }

        $cart->save();

        $this->session->put(config('cart.session.key'), $cart->uuid);
        // $key = config('cart.session.key');
        // session([$key => $cart->uuid]);
    }

    public function add(Variation $variation, int $quantity = 1)
    {
        // dd($variation);
        // if (!$this->instance) {
        //     return;
        // }
        $this->instance()->variations()->syncWithoutDetaching([
            $variation->id => [
                'quantity' => $quantity
            ]
        ]);
    }

    public function contents()
    {
        return $this->instance()->variations;
    }

    public function contentsCount()
    {
        return $this->contents()->count();
    }

    protected function instance(): Cart
    {
        if ($this->instance) {
            return $this->instance;
        }

        $this->instance = Cart::whereUuid($this->session->get(config('cart.session.key')))->first();

        return $this->instance;
    }
}

