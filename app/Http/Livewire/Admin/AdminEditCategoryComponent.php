<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\Subcategory;

class AdminEditCategoryComponent extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $is_popular;
    public $newimage;
    public $scategory_id;
    public $scategory_slug;
    public $hidden_father;

    public function mount($category_id, $scategory_id=null)
    {
        if($scategory_id)
        {
            // $this->scategory_slug = $scategory_slug;
            $scategory = Subcategory::find($scategory_id);
            $this->scategory_id = $scategory->id;
            $this->category_id = $scategory->category_id;
            $this->name = $scategory->name;
            $this->slug = $scategory->slug;
            $this->image = $scategory->image;
            $this->is_popular = $scategory->is_popular;
            $this->hidden_father = true;
        }
        else
        {
            $category = Category::find($category_id);
            $this->category_id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->image = $category->image;
            $this->is_popular = $category->is_popular;
            $this->hidden_father = false;
        }
        
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
        ]);
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        if($this->scategory_id)
        {
            $scategory = Subcategory::find($this->scategory_id);
            $scategory->name = $this->name;
            $scategory->slug = $this->slug;
            if($this->newimage)
            {
                unlink('assets/imgs/categories/'.$scategory->image);
                $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
                $this->newimage->storeAs('categories', $imageName);
                $scategory->image = $imageName;
            }
            $scategory->is_popular = $this->is_popular;
            $scategory->category_id = $this->category_id;
            $scategory->save();
        }
        else
        {
            $category = Category::find($this->category_id);
            $category->name = $this->name;
            $category->slug = $this->slug;
            if($this->newimage)
            {
                // unlink('assets/imgs/categories/'.$category->newimage);
                $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
                $this->newimage->storeAs('categories', $imageName);
                $category->image = $imageName;
            }
            $category->is_popular = $this->is_popular;
            $category->save();

        }
        session()->flash('message', 'Categoria actualizada con éxito');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-category-component', compact('categories'));
    }
}
