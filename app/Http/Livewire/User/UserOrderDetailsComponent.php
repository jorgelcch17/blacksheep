<?php

namespace App\Http\Livewire\User;

use App\Models\City;
use App\Models\Department;
use Livewire\Component;
use App\Models\Order;
use App\Models\Province;

class UserOrderDetailsComponent extends Component
{
    public $order;

    public $department;
    public $province;
    public $city;

    public function mount($order_id)
    {
        $this->order = Order::find($order_id);
        $shippingAddress = json_decode($this->order->shipping_address);
        $this->department = Department::where('id', $shippingAddress->department_id)->first()->name;
        $this->province = Province::where('id', $shippingAddress->province_id)->first()->name;
        $this->city = City::where('id', $shippingAddress->city_id)->first()->name;
    }

    public function render()
    {
        $shippingAddress = json_decode($this->order->shipping_address);
        $shippingType = json_decode($this->order->shipping_type);
        $items = json_decode($this->order->content);
        return view('livewire.user.user-order-details-component', compact('shippingAddress', 'shippingType', 'items'));
    }
}
