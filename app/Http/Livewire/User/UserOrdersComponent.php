<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use App\Models\Department;
use App\Models\Province;
use App\Models\Order;

class UserOrdersComponent extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(5);
        return view('livewire.user.user-orders-component', compact('orders'));
    }
}
