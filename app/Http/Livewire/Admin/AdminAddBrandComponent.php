<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminAddBrandComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $logo;
    public $status;

    public function generateSlug()
    {
        $this->slug = str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'logo' => 'required'
        ]);
    }

    public function storeBrand()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'logo' => 'required'
        ]);
        $brand = new Brand();
        $brand->name = $this->name;
        $brand->slug = $this->slug;
        $imageName = Carbon::now()->timestamp. '.' . $this->logo->extension();
        $this->logo->storeAs('brands', $imageName);
        $brand->logo = $imageName;
        $brand->status = $this->status;
        $brand->save();
        session()->flash('message', 'Marca creada correctamente!');
    }


    public function render()
    {
        return view('livewire.admin.admin-add-brand-component');
    }
}
