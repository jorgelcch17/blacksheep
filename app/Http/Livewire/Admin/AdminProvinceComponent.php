<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Department;
use App\Models\Province;
use Illuminate\Support\Str;

class AdminProvinceComponent extends Component
{
    public $department;

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

    public function mount(Department $department)
    {
        $this->department = $department;
    }	

    public function editProvince($province)
    {
        $edit_province = Province::find($province);
        $this->edit_id = $edit_province->id;
        $this->edit_name = $edit_province->name;
        $this->edit_slug = $edit_province->slug;
    }

    public function storeProvince()
    {
        $this->validate([
            'new_name' => 'required',
            'new_slug' => 'required'
        ]);

        $province = new Province();
        $province->name = $this->new_name;
        $province->slug = $this->new_slug;
        $province->department_id = $this->department->id;
        $province->save();
        // limpiando los campos
        $this->new_name = '';
        $this->new_slug = '';
        session()->flash('message', 'Provincia creada correctamente!');
    }

    public function updateProvince()
    {
        $this->validate([
            'edit_name' => 'required',
            'edit_slug' => 'required'
        ]);

        $province = Province::find($this->edit_id);
        $province->name = $this->edit_name;
        $province->slug = $this->edit_slug;
        $province->save();
        session()->flash('message', 'Provincia actualizada correctamente!');
    }

    public function changeStatusProvince($province_id)
    {
        $province = Province::find($province_id);
        if($province->status == 1)
        {
            $province->status = 0;
        }
        else
        {
            $province->status = 1;
        }
        $province->save();
        session()->flash('message', 'Estado de la ciudad actualizado correctamente!');
    }

    public function render()
    {
        $provinces = Province::where('department_id', $this->department->id)->get();
        return view('livewire.admin.admin-province-component', compact('provinces'));
    }
}
