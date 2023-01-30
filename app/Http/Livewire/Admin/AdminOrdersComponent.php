<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminOrdersComponent extends Component
{
    public function render()
    {
        $orders = Order::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.admin-orders-component', compact('orders'));
    }
}
