<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Tag;
use App\Models\Subcategory;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock_status = 'instock';
    public $featured = 0;
    public $quantity;
    public $image;
    public $images;
    public $category_id;
    public $subcategory_id;
    public $brand_id;
    public $color;
    public $sizes = [];
    public $subcategories = [];

    // campos para poner las tallas y cantidades antes de añadir a la variable $sizes
    public $temporal_size;
    public $temporal_quantity;

    // variable para el buscador de producto
    public $search;
    public $result_search=[];
    public $selected_product_vc;
    public $selected_group=[];

    // variable para el buscador de etiquetas
    public $search_tag;
    public $result_search_tag=[];
    public $selected_tags=[];

    // burcar producto por nombre al actualizarse la variable $search
    public function updatedSearch($value)
    {
        $this->result_search = Product::where('name', 'like', '%' . $value . '%')->get();
    }

    // burcar etiquetas por nombre al actualizarse la variable $search_tag
    public function updatedSearchTag($value)
    {
        if($this->search_tag)
        {
            $this->result_search_tag = Tag::where('name', 'like', '%' . $value . '%')->whereNotIn('id',array_column($this->selected_tags, 'id'))->get();
        }
        else
        {
            $this->result_search_tag = [];
        }
    }

    public function updatedCategoryId($value)
    {
        $this->subcategories = Subcategory::where('category_id', $value)->get();
    }

    // funcion que añade las etiquetas a la variable $selected_tags
    public function addTag($id)
    {
        $tag = Tag::find($id);
        $encontrado = false;
        foreach ($this->selected_tags as $stag) {
            if (in_array($tag->id, $stag)) {
                $encontrado = true;
                break;
            }
        }

        if (!$encontrado) {
            array_push($this->selected_tags, [
                'id' => $tag->id,
                'name' => $tag->name,
            ]);
        }
        $this->result_search_tag = [];
        $this->search_tag = '';
    }

    public function removeTag($id)
{
    $this->selected_tags = array_filter($this->selected_tags, function ($tag) use ($id) {
        return $tag['id'] != $id;
    });
}

    public function selectProductGroup($id)
    {
        $product = Product::find($id);
        $this->selected_product_vc= $product->variant_code;
        $this->result_search = [];
        $this->selected_group = Product::where('variant_code', $this->selected_product_vc)->get();
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }

    // funcion que añade las tallas y cantidades a la variable $sizes
    public function addSize()
    {
        // añadiendo con push a la variable $sizes
        $this->validate([
            'temporal_size' => 'required',
            'temporal_quantity' => 'required|numeric',
        ]);
        $encontrado = false;
        foreach ($this->sizes as $size) {
            if (in_array(strtoupper($this->temporal_size), $size)) {
                $encontrado = true;
                break;
            }
        }

        if (!$encontrado) {
            array_push($this->sizes, [
                'size' => strtoupper($this->temporal_size),
                'quantity' => $this->temporal_quantity,
            ]);
        }

        else
        {
            session()->flash('message', 'La talla ya existe');
        }
        $this->temporal_size='';
        $this->temporal_quantity='';
    }

    // funcion que elimina las tallas y cantidades de la variable $sizes
    public function removeSize($index)
    {
        unset($this->sizes[$index]);
        $this->sizes = array_values($this->sizes);
    }

    public function addProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            // 'sale_price' => 'required',
            'sku' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'color' => 'required',
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->sku;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products', $imageName);
        $product->image = $imageName;

        if($this->images)
        {
            $imagesname = '';
            foreach($this->images as $key=>$image)
            {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('products', $imgName);
                $imagesname = $imagesname . ',' . $imgName;
            }
            $product->images = $imagesname;
        }

        $product->category_id = $this->category_id;
        $product->subcategory_id = $this->subcategory_id;
        $product->brand_id = $this->brand_id;
        $product->color = $this->color;
        if($this->selected_product_vc)
        {
            $product->variant_code = $this->selected_product_vc;
        }
        else
        {
            // generando un codigo de variante aleatorio usando $this->faker->unique()->uuid
            $product->variant_code = $this->faker->unique()->uuid;
        }
        // guardando las etiquetas
        
        $product->save();
        $selected_tags_ids = array_column($this->selected_tags, 'id');
        $product->tags()->sync($selected_tags_ids);

        foreach($this->sizes as $size)
        {
            $new_size = new Size();
            $new_size->size = $size['size'];
            $new_size->quantity = $size['quantity'];
            $new_size->product_id = $product->id;
            $new_size->save();
        }

        session()->flash('message', 'Producto creado exitosamente');
    }

    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $brands = Brand::orderBy('name', 'ASC')->get();
        $tags = Tag::orderBy('name', 'ASC')->get();
        return view('livewire.admin.admin-add-product-component', compact('categories', 'brands', 'tags'));
    }
}
