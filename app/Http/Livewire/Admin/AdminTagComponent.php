<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Tag;
use Illuminate\Support\Str;

class AdminTagComponent extends Component
{
    public $new_name;
    public $new_slug;

    public $edit_id;
    public $edit_name;
    public $edit_slug;

    public $for_delete_tag_id;

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

    public function editTag($tag)
    {
        $edit_tag = Tag::find($tag);
        $this->edit_id = $edit_tag->id;
        $this->edit_name = $edit_tag->name;
        $this->edit_slug = $edit_tag->slug;
    }

    public function storeTag()
    {
        $tag = new Tag();
        $tag->name = $this->new_name;
        $tag->slug = $this->new_slug;
        $tag->save();
        session()->flash('message', 'Etiqueta creada correctamente!');
    }

    public function updateTag()
    {
        $tag = Tag::find($this->edit_id);
        $tag->name = $this->edit_name;
        $tag->slug = $this->edit_slug;
        $tag->save();
        $this->edit_id = '';
        $this->edit_name = '';
        $this->edit_slug = '';
        session()->flash('message', 'Etiqueta actualizada correctamente!');
    }

    public function deleteTag()
    {
        $tag = Tag::find($this->for_delete_tag_id);
        $tag->delete();
        session()->flash('message', 'Etiqueta eliminada correctamente!');
    }

    public function render()
    {
        $tags = Tag::paginate(10);
        return view('livewire.admin.admin-tag-component', compact('tags'));
    }
}
