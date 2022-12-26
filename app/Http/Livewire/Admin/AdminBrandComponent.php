<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Brand;
use Livewire\WithPagination;

class AdminBrandComponent extends Component
{
    public $brand_id;

    use WithPagination;

    public function deleteBrand()
    {
        $brand = Brand::find($this->brand_id);
        unlink('assets/imgs/brands/'.$brand->logo);
        $brand->delete();
        session()->flash('message', 'Registro eliminado con éxito');
    }

    public function render()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.admin-brand-component', compact('brands'));
    }
}
