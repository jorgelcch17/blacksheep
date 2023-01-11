<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class ExploreCategoriesComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.explore-categories-component', compact('categories'));
    }
}
