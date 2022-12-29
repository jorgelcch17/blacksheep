<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Department;
use App\Models\Province;
use App\Models\City;
use Illuminate\Support\Str;

class AdminCityComponent extends Component
{
    public $department;
    public $province;

    public $new_name;
    public $new_slug;

    public $edit_id;
    public $edit_name;
    public $edit_slug;

    public function generateSlug()
    {
        if($this->new_name)
        {
            $this->new_slug = Str::slug($this->new_name);
        }

        if($this->edit_name)
        {
            $this->edit_slug = Str::slug($this->edit_name);
        }
    }

    public function editCity($city)
    {
        $edit_city = City::find($city);
        $this->edit_id = $edit_city->id;
        $this->edit_name = $edit_city->name;
        $this->edit_slug = $edit_city->slug;
    }

    public function mount(Department $department, Province $province)
    {
        $this->department = $department;
        $this->province = $province;
    }

    public function storeCity()
    {
        $this->validate([
            'new_name' => 'required',
            'new_slug' => 'required'
        ]);

        $city = new City();
        $city->name = $this->new_name;
        $city->slug = $this->new_slug;
        $city->province_id = $this->province->id;
        $city->save();
        // limpiando los campos
        $this->new_name = '';
        $this->new_slug = '';
        session()->flash('message', 'Ciudad creada correctamente!');
    }

    public function updateCity()
    {
        $this->validate([
            'edit_name' => 'required',
            'edit_slug' => 'required'
        ]);

        $city = City::find($this->edit_id);
        $city->name = $this->edit_name;
        $city->slug = $this->edit_slug;
        $city->save();
        // limpiando los campos
        $this->edit_id = '';
        $this->edit_name = '';
        $this->edit_slug = '';
        session()->flash('message', 'Ciudad actualizada correctamente!');
    }

    public function changeStatusCity($city_id)
    {
        $city = City::find($city_id);
        if($city->status == 1)
        {
            $city->status = 0;
        }
        else
        {
            $city->status = 1;
        }
        $city->save();
        session()->flash('message', 'Estado de la ciudad actualizado correctamente!');
    }

    public function render()
    {
        $cities = City::where('province_id', $this->province->id)->get();
        return view('livewire.admin.admin-city-component', compact('cities'));
    }
}
