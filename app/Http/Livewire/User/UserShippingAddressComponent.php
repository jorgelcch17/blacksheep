<?php

namespace App\Http\Livewire\User;

use App\Models\City;
use App\Models\Department;
use App\Models\Province;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserShippingAddressComponent extends Component
{
    // variables para agregar una nueva dirección
    public $alias;
    public $name;
    public $phone_number;
    public $email;
    public $company_name;
    public $nit;
    public $selected_department_id='';

    public $provinces=[];
    public $selected_province_id='';

    public $cities=[];
    public $selected_city_id='';

    public $address;
    public $reference;

    // variables para editar una dirección
    public $edit_address_id;
    public $edit_alias;
    public $edit_name;
    public $edit_phone_number;
    public $edit_email;
    public $edit_company_name;
    public $edit_nit;
    public $edit_departments=[];
    public $edit_selected_department_id='';
    public $edit_provinces=[];
    public $edit_selected_province_id='';
    public $edit_cities=[];
    public $edit_selected_city_id='';
    public $edit_address;
    public $edit_reference;

    public function updatedSelectedDepartmentId()
    {
        $this->provinces = Province::where('department_id', $this->selected_department_id)->get();
        $this->cities=[];
        $this->selected_province_id='';
        $this->selected_city_id='';
    }

    public function updatedSelectedProvinceId($value)
    {
        $this->cities = City::where('province_id', $value)->get();
    }

    public function storeAddress()
    {
        $this->validate([
            'alias' => 'required',
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'company_name' => 'required',
            'nit' => 'required',
            'selected_department_id' => 'required',
            'selected_province_id' => 'required',
            'selected_city_id' => 'required',
            'address' => 'required',
            'reference' => 'required',
        ]);
        $address = new ShippingAddress();
        $address->alias = $this->alias;
        $address->name = $this->name;
        $address->phone_number = $this->phone_number;
        $address->email = $this->email;
        $address->company_name = $this->company_name;
        $address->nit = $this->nit;
        $address->department_id = $this->selected_department_id;
        $address->province_id = $this->selected_province_id;
        $address->city_id = $this->selected_city_id;
        $address->address = $this->address;
        $address->reference = $this->reference;
        $address->user_id = Auth::user()->id;
        $address->save();
        // limpiar los campos
        $this->alias='';
        $this->name='';
        $this->phone_number='';
        $this->email='';
        $this->company_name='';
        $this->nit='';
        $this->selected_department_id='';
        $this->selected_province_id='';
        $this->selected_city_id='';
        $this->address='';
        $this->reference='';
        session()->flash('message', 'Dirección agregada con éxito');
    }

    public function editAddress($id)
    {
        $address = ShippingAddress::find($id);
        $this->edit_address_id = $address->id;
        $this->edit_alias = $address->alias;
        $this->edit_name = $address->name;
        $this->edit_phone_number = $address->phone_number;
        $this->edit_email = $address->email;
        $this->edit_company_name = $address->company_name;
        $this->edit_nit = $address->nit;
        $this->edit_departments = Department::all();
        $this->edit_selected_department_id = $address->department_id;
        $this->edit_provinces = Province::where('department_id', $address->department_id)->get();
        $this->edit_selected_province_id = $address->province_id;
        $this->edit_cities = City::where('province_id', $address->province_id)->get();
        $this->edit_selected_city_id = $address->city_id;
        $this->edit_address = $address->address;
        $this->edit_reference = $address->reference;
    }

    public function deleteAddress($id)
    {
        $address = ShippingAddress::find($id);
        $address->delete();
        session()->flash('message', 'Dirección eliminada con éxito');
    }

    public function updateAddress()
    {
        $this->validate([
            'edit_alias' => 'required',
            'edit_name' => 'required',
            'edit_phone_number' => 'required',
            'edit_email' => 'required|email',
            'edit_company_name' => 'required',
            'edit_nit' => 'required',
            'edit_selected_department_id' => 'required',
            'edit_selected_province_id' => 'required',
            'edit_selected_city_id' => 'required',
            'edit_address' => 'required',
            'edit_reference' => 'required',
        ]);
        $address = ShippingAddress::find($this->edit_address_id);
        $address->alias = $this->edit_alias;
        $address->name = $this->edit_name;
        $address->phone_number = $this->edit_phone_number;
        $address->email = $this->edit_email;
        $address->company_name = $this->edit_company_name;
        $address->nit = $this->edit_nit;
        $address->department_id = $this->edit_selected_department_id;
        $address->province_id = $this->edit_selected_province_id;
        $address->city_id = $this->edit_selected_city_id;
        $address->address = $this->edit_address;
        $address->reference = $this->edit_reference;
        $address->save();
        session()->flash('message', 'Dirección actualizada con éxito');
    }

    public function render()
    {
        $addresses = ShippingAddress::where('user_id', Auth::user()->id)->get();
        $departments = Department::where('status', 1)->get();
        return view('livewire.user.user-shipping-address-component', compact('addresses', 'departments'));
    }
}
