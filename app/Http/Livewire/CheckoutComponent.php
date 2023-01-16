<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutComponent extends Component
{
    public function render()
    {
        // obteniendo las direcciones del usuario
        $addresses = auth()->user()->addresses;
        return view('livewire.checkout-component', compact('addresses'));
    }
}
