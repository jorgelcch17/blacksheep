<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use App\Models\Subcategory;

class AdminAddCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $is_popular=0;
    public $category_id;

    public function generateSlug()
    {
        $this->slug = str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required'
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required'
        ]);
        if($this->category_id)
        {
            $scategory = new Subcategory();
            $scategory->name = $this->name;
            $scategory->slug = $this->slug;
            $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
            $this->image->storeAs('categories', $imageName);
            $scategory->image = $imageName;
            $scategory->is_popular = $this->is_popular;
            $scategory->category_id = $this->category_id;
            $scategory->save();
        }
        else
        {
            $category = new Category();
            $category->name = $this->name;
            $category->slug = $this->slug;
            $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
            $this->image->storeAs('categories', $imageName);
            $category->image = $imageName;
            $category->is_popular = $this->is_popular;
            $category->save();
        }
        session()->flash('message', 'Categoria creada correctamente!');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-category-component', compact('categories'));
    }
}
