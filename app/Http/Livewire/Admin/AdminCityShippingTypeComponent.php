<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Department;
use App\Models\Province;
use App\Models\City;
use App\Models\ShippingType;

class AdminCityShippingTypeComponent extends Component
{
    public $department;
    public $province;
    public $city;

    public $shipping_type_id='';
    public $shipping_type_price;
    public $shipping_type_detail;

    // variables para el formulario de edicion de tipo de envio
    public $for_edit_city_shipping_type_id;
    public $for_edit_shipping_type_name;
    public $for_edit_shipping_type_price;
    public $for_edit_shipping_type_detail;

    public $for_delete_city_shipping_type_id;

    public function mount(Department $department, Province $province, City $city)
    {
        $this->department = $department;
        $this->province = $province;
        $this->city = $city;
    }

    public function editCityShippingType($id)
    {
        $city_shipping_type = $this->city->shippingTypes()->where('shipping_type_id', $id)->first();
        // dd($city_shipping_type);
        $this->for_edit_city_shipping_type_id = $city_shipping_type->id;
        $this->for_edit_shipping_type_name = $city_shipping_type->name;
        $this->for_edit_shipping_type_price = $city_shipping_type->pivot->price;
        $this->for_edit_shipping_type_detail = $city_shipping_type->pivot->details;
    }

    public function storeCityShippingType()
    {
        $this->validate([
            'shipping_type_id' => 'required',
        ]);
        // añadiendo el shipping type a la ciudad solo si no existe caso contrario informar que ya existe
        $city_shipping_type = $this->city->shippingTypes()->where('shipping_type_id', $this->shipping_type_id)->first();
        if(!$city_shipping_type){
            $this->city->shippingTypes()->attach($this->shipping_type_id, [
                'price' => $this->shipping_type_price,
                'details' => $this->shipping_type_detail,
            ]);
        }else{
            session()->flash('warning', 'Este tipo de envio ya existe en esta ciudad!');
            return;
        }
        $this->shipping_type_id = '';
        $this->shipping_type_price = '';
        $this->shipping_type_detail = '';
        session()->flash('message', 'Tipo de envio añadido a la ciudad!');
    }

    public function deleteCityShippingType()
    {
        // buscando el shipping type en la ciudad
        // $city_shipping_type = $this->city->shippingTypes()->where('shipping_type_id', $this->for_delete_city_shipping_type_id)->first();
        $this->city->shippingTypes()->detach($this->for_delete_city_shipping_type_id);
        session()->flash('message', 'Tipo de envio eliminado de la ciudad!');
    }

    public function changeStatusCityShippingType($id)
    {
        $shipping_type = ShippingType::find($id);
        if ($shipping_type->is_active == 1) {
            $shipping_type->is_active = 0;
        } else {
            $shipping_type->is_active = 1;
        }
        $shipping_type->save();
        session()->flash('message', 'Estado del tipo de envio actualizado!');
    }

    public function updateCityShippingType()
    {
        // buscando el shipping type en la ciudad para actualizarlo, buscando a traves del shipping_type_id del pivot
        $city_shipping_type = $this->city->shippingTypes()->where('shipping_type_id', $this->for_edit_city_shipping_type_id)->first();
        // dd($city_shipping_type);
        $city_shipping_type->pivot->price = $this->for_edit_shipping_type_price;
        $city_shipping_type->pivot->details = $this->for_edit_shipping_type_detail;
        $city_shipping_type->pivot->save();
        session()->flash('message', 'Tipo de envio actualizado!');
    }

    public function render()
    {
        $all_shipping_types = ShippingType::where('is_active', 1)->get();
        $shipping_types = $this->city->shippingTypes()->get();
        return view('livewire.admin.admin-city-shipping-type-component', compact('shipping_types', 'all_shipping_types'));
    }
}
