<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Brand;

class AboutComponent extends Component
{
    public function render()
    {
        $brands = Brand::where('status', 1)->get();
        return view('livewire.about-component', compact('brands'));
    }
}
