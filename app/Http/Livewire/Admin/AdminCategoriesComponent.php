<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use App\Models\Subcategory;

class AdminCategoriesComponent extends Component
{
    public $category_id;
    public $subcategory_id;

    use WithPagination;

    public function deleteCategory()
    {
        $category = Category::find($this->category_id);
        unlink('assets/imgs/categories/'.$category->image);
        $category->delete();
        session()->flash('message', 'Registro eliminado con éxito');
    }

    public function deleteSubcategory()
    {
        $scategory = Subcategory::find($this->subcategory_id);
        // unlink('assets/imgs/subcategories/'.$scategory->image);
        $scategory->delete();
        session()->flash('message', 'Subcategoría eliminada con éxito');
    }

    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->paginate(5);
        return view('livewire.admin.admin-categories-component', compact('categories'));
    }
}
