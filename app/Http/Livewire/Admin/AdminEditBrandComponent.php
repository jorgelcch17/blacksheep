<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditBrandComponent extends Component
{
    use WithFileUploads;
    public $brand_id;
    public $name;
    public $slug;
    public $logo;
    public $status;
    public $newlogo;

    public function mount($brand_id)
    {
        $brand = Brand::find($brand_id);
        $this->brand_id = $brand->id;
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->logo = $brand->logo;
        $this->status = $brand->status;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updateBrand()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        $brand = Brand::find($this->brand_id);
        $brand->name = $this->name;
        $brand->slug = $this->slug;
        if($this->newlogo)
        {
            unlink('assets/imgs/brands/'.$this->logo);
            $imageName = Carbon::now()->timestamp. '.' . $this->newlogo->extension();
            $this->newlogo->storeAs('brands', $imageName);
            $brand->logo = $imageName;
        }
        $brand->status = $this->status;
        $brand->save();
        session()->flash('message', 'Marca actualizada correctamente!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-brand-component');
    }
}
