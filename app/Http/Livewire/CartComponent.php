<?php

namespace App\Http\Livewire;

use App\Models\Sale;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    //function for increasing quantity of product in cart
    public function increaseQuantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
    }

    //function for decreasing quantity of product in cart
    public function decreaseQuantity($rowId) {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
    }

    //function for removing a quantity of product in cart
    public function destory($rowId) {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message','Item has been removed');   
    }

    //function for removing all quantity of product in cart at once
    public function deleteAll() {
        Cart::instance('cart')->destroy();  
    }

    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
