<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ShippingType;

class AdminShippingTypeComponent extends Component
{
    // variables para el formulario de creacion de tipo de envio
    public $shipping_type_name;
    public $shipping_type_description;
    public $shipping_type_price;
    public $shipping_type_delivery_time;
    public $shipping_type_is_active = 1;

    // variables para el formulario de edicion de tipo de envio
    public $for_edit_shipping_type_id;
    public $for_edit_shipping_type_name;
    public $for_edit_shipping_type_description;
    public $for_edit_shipping_type_price;
    public $for_edit_shipping_type_delivery_time;
    public $for_edit_shipping_type_is_active = 1;

    // variables para eliminar un tipo de envio
    public $for_delete_shipping_type_id;

    public function selectForEdit($shipping_type_id)
    {
        $shipping_type = ShippingType::find($shipping_type_id);
        $this->for_edit_shipping_type_id = $shipping_type->id;
        $this->for_edit_shipping_type_name = $shipping_type->name;
        $this->for_edit_shipping_type_description = $shipping_type->description;
        $this->for_edit_shipping_type_price = $shipping_type->price;
        $this->for_edit_shipping_type_delivery_time = $shipping_type->delivery_time;
        $this->for_edit_shipping_type_is_active = $shipping_type->is_active;        
    }

    public function storeShippingType()
    {
        $this->validate([
            'shipping_type_name' => 'required',
            'shipping_type_description' => 'required',
            'shipping_type_price' => 'required',
            'shipping_type_delivery_time' => 'required',
            'shipping_type_is_active' => 'required',
        ]);

        $shipping_type = new ShippingType();
        $shipping_type->name = $this->shipping_type_name;
        $shipping_type->description = $this->shipping_type_description;
        $shipping_type->price = $this->shipping_type_price;
        $shipping_type->delivery_time = $this->shipping_type_delivery_time;
        $shipping_type->is_active = $this->shipping_type_is_active;
        $shipping_type->save();
        session()->flash('message', 'Tipo de envio creado!');
        $this->reset('shipping_type_name', 'shipping_type_description', 'shipping_type_price', 'shipping_type_delivery_time', 'shipping_type_is_active');
    }

    public function updateShippingType()
    {
        $this->validate([
            'for_edit_shipping_type_name' => 'required',
            'for_edit_shipping_type_description' => 'required',
            'for_edit_shipping_type_price' => 'required',
            'for_edit_shipping_type_delivery_time' => 'required',
            'for_edit_shipping_type_is_active' => 'required',
        ]);

        $shipping_type = ShippingType::find($this->for_edit_shipping_type_id);
        $shipping_type->name = $this->for_edit_shipping_type_name;
        $shipping_type->description = $this->for_edit_shipping_type_description;
        $shipping_type->price = $this->for_edit_shipping_type_price;
        $shipping_type->delivery_time = $this->for_edit_shipping_type_delivery_time;
        $shipping_type->is_active = $this->for_edit_shipping_type_is_active;
        $shipping_type->save();
        session()->flash('message', 'Tipo de envio actualizado!');
        $this->reset('for_edit_shipping_type_name', 'for_edit_shipping_type_description', 'for_edit_shipping_type_price', 'for_edit_shipping_type_delivery_time', 'for_edit_shipping_type_is_active');
    }

    public function deleteShippingType()
    {
        $shipping_type = ShippingType::find($this->for_delete_shipping_type_id);
        $shipping_type->delete();
        session()->flash('message', 'Tipo de envio eliminado!');
    }

    public function render()
    {
        $shipping_types = ShippingType::all();
        return view('livewire.admin.admin-shipping-type-component', compact('shipping_types'));
    }
}
