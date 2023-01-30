<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\CityShippingType;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use App\Models\Order;
use App\Models\ShippingAddress;

class CheckoutComponent extends Component
{
    use AuthorizesRequests;

    public $order;
    public $shipping_cost = 0;

    public $shippingAddress;
    public $differentaddress = 0;

    public $shipping_type_id;

    // traduciendo los errores
    protected $messages = [
        'shippingAddress.required' => 'Debe seleccionar una dirección de envío',
        'shipping_type_id.required' => 'Debe seleccionar un tipo de envío',
    ];

    public function mount(Order $order_id)
    {
        $this->order = $order_id;
        if($this->order->shipping_address != null)
        {
            $this->shippingAddress = json_decode($this->order->shipping_address)->id;
        }
        if($this->order->shipping_type != null)
        {
            $this->shipping_type_id = json_decode($this->order->shipping_type)->id;
        }
    }

    public function updatedShippingAddress()
    {
        // guardando la direccion de envio en la orden
        $this->order->shipping_address = ShippingAddress::where('id', $this->shippingAddress)->first();
        $this->order->shipping_type = null;
        $this->order->shipping_cost = 0;
        $this->order->save();
        $this->reset(['shipping_type_id', 'shipping_cost']);
    }

    public function updatedShippingTypeId()
    {
        $this->shipping_cost = CityShippingType::where('id', $this->shipping_type_id)->first()->price;
        // guardando el tipo de envio en la orden
        $this->order->shipping_type = CityShippingType::where('id', $this->shipping_type_id)->first();
        $this->order->shipping_cost = $this->shipping_cost;
        $this->order->total = $this->order->subtotal + $this->shipping_cost + $this->order->tax - $this->order->discount;
        $this->order->save();
    }

    public function updatedDifferentaddress($value)
    {
        $this->reset(['shippingAddress', 'shipping_type_id', 'shipping_cost']);
    }

    public function payOrder()
    {
        $this->validate([
            'shippingAddress' => 'required',
            'shipping_type_id' => 'required',
        ]);
        $this->order->status = Order::RECIBIDO;
        $this->order->save();
        return redirect()->route('user.orders');
    }

    public function render()
    {
        // dd($this->order->user_id);
        $this->authorize('author', $this->order);
        $this->authorize('payment', $this->order);

        $items = json_decode($this->order->content);
        // obteniendo las direcciones del usuario
        $addresses = auth()->user()->addresses;

        if (!$this->shippingAddress == null) {
            // obteniendo la ciudad de la direccion de envio
            $city_id = ShippingAddress::where('id', $this->shippingAddress)->first()->city_id;
            // buscando todos los tipos de envio de la ciudad de la direccion de envio
            $shippingTypes = CityShippingType::where('city_id', $city_id)->get();
        }else{
            $shippingTypes = null;
        }

        return view('livewire.checkout-component', compact('addresses', 'items', 'shippingTypes'));
    }
}
