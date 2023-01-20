<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
class WishlistComponent extends Component
{
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component', 'refreshComponent');
                return;
            }
        }
    }

    public function restoreWishlist()
    {
        Cart::instance('wishlist')->merge(auth()->user()->id);
    }

    public function restoreWish()
    {
        Cart::instance('wishlist')->restore(auth()->user()->id);
    }

    public function render()
    {
        return view('livewire.wishlist-component');
    }
}
