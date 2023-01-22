<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Gloudemans\Shoppingcart\Facades\Cart;

class MergeTheCartLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        // eliminar el registro del cart
        Cart::instance('cart')->erase(auth()->user()->id);
        // elminar el registro del wishlist
        Cart::instance('wishlist')->erase(auth()->user()->id);
        // guardar el cart
        Cart::instance('cart')->store(auth()->user()->id);
        // guardar el wishlist
        Cart::instance('wishlist')->store(auth()->user()->id);
    }
}
