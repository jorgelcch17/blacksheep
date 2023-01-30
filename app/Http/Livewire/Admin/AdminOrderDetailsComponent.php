<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\Department;
use App\Models\Order;
use App\Models\Province;
use Livewire\Component;

class AdminOrderDetailsComponent extends Component
{
    public $order;

    public $department;
    public $province;
    public $city;

    public $statusOrder;

    public function mount($order_id)
    {
        $this->order = Order::find($order_id);
        $shippingAddress = json_decode($this->order->shipping_address);
        $this->department = Department::where('id', $shippingAddress->department_id)->first()->name;
        $this->province = Province::where('id', $shippingAddress->province_id)->first()->name;
        $this->city = City::where('id', $shippingAddress->city_id)->first()->name;
        $this->statusOrder = $this->order->status;
    }

    public function updatedStatusOrder()
    {
        $this->order->status = $this->statusOrder;
        $this->order->save();
    }

    public function render()
    {
        $shippingAddress = json_decode($this->order->shipping_address);
        $shippingType = json_decode($this->order->shipping_type);
        $items = json_decode($this->order->content);
        return view('livewire.admin.admin-order-details-component', compact('shippingAddress', 'shippingType', 'items'));
    }
}
