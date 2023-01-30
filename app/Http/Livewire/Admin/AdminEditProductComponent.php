<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Tag;
use App\Models\Subcategory;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $product_id;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    // public $stock_status = 'instock';
    public $featured = 0;
    // public $quantity;
    public $image;
    public $category_id;
    public $subcategory_id;
    public $brand_id;
    public $newimage;
    public $color;
    public $is_active;
    public $sizes = [];
    public $subcategories = [];


    public $images;
    // public $newimages;

    // campos para poner las tallas y cantidades antes de añadir a la variable $sizes
    public $temporal_size;
    public $temporal_quantity;

    // variable para el buscador de producto
    public $search;
    public $result_search=[];
    public $selected_product_vc;
    public $selected_group=[];

    // variables para las etiquetas
    public $search_tag;
    public $result_search_tag=[];
    public $selected_tags=[];

    // escuchando el evento refreshParent
    protected $listeners = ['refreshParent' => 'refreshComponent'];


    // function refreshComponent
    public function refreshComponent()
    {
        $this->mount($this->product_id);
    }

    public function updatedImages()
    {
        $this->changeOrder();
    }

    public function changeOrder()
    {
        // pasando el array de imagenes a string
        $this->images = implode(',', $this->images);
        // buscando el producto
        $product = Product::find($this->product_id);
        // actualizando el campo images
        $product->images = $this->images;
        // guardando el producto
        $product->save();
        $this->mount($this->product_id);
    }

    // funcion para eliminar una imagen
    public function deleteImage($image)
    {
        // buscando el producto
        $product = Product::find($this->product_id);
        // pasando el string de imagenes a array
        $images = explode(',', $product->images);
        // eliminando la imagen del array
        $key = array_search($image, $images);
        unset($images[$key]);
        // eliminando la imagen del servidor
        if(file_exists('assets/imgs/products/'.$image))
        {
            unlink('assets/imgs/products/'.$image);
        }
        // pasando el array de imagenes a string
        $this->images = implode(',', $images);
        // actualizando el campo images
        $product->images = $this->images;
        // guardando el producto
        $product->save();
        $this->mount($this->product_id);
    }

    public function updatedSearch($value)
    {
        $this->result_search = Product::where('name', 'like', '%' . $value . '%')->get();
    }

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

    public function selectProductGroup($id)
    {
        $product = Product::find($id);
        $this->selected_product_vc= $product->variant_code;
        $this->result_search = [];
        $this->selected_group = Product::where('variant_code', $this->selected_product_vc)->get();
    }

    public function mount($product_id)
    {
        $product = Product::find($product_id);
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->sku = $product->SKU;
        // $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        // $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->images = explode(',', $product->images);
        $this->category_id = $product->category_id;
        $this->subcategories = Subcategory::where('category_id', $product->category_id)->get();
        $this->subcategory_id = $product->subcategory_id;
        $this->brand_id = $product->brand_id;
        $this->color = $product->color;
        $this->is_active = $product->is_active;

        $product_sizes = $product->sizes;
        $this->sizes = [];
        foreach($product_sizes as $size)
        {
            array_push($this->sizes, [
                'size' => $size->size,
                'quantity' => $size->quantity,
                'product_id' => $size->product_id,
            ]);
        }

        $this->selected_product_vc = $product->variant_code;
        $this->selected_group = Product::where('variant_code', $this->selected_product_vc)->get();

        $this->selected_tags = $product->tags->toArray();
    }

    public function generateSlug()
{
        $this->slug = Str::slug($this->name);
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required',
            // 'sale_price' => 'required',
            // 'sku' => 'required',
            // 'stock_status' => 'required',
            'featured' => 'required',
            // 'quantity' => 'required',
            // 'image' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'color' => 'required',
            'sizes' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'image|mimes:jpg,jpeg,png'
            ]);
        }

        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        if($this->sale_price)
        {
            $product->sale_price = $this->sale_price;
        }
        else
        {
            $product->sale_price = null;
        }
        $product->SKU = $this->sku;
        // $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        // $product->quantity = $this->quantity;
        if($this->newimage)
        {
            // eliminando la imagen del archivo products usando file_exists
            if(file_exists('assets/imgs/products/'.$product->image))
            {
                unlink('assets/imgs/products/'.$product->image);
            }
            $imageName = Carbon::now()->timestamp . '. ' . $this->newimage->extension();
            $this->newimage->storeAs('products', $imageName);
            $product->image = $imageName;
        }

        // if($this->newimages)
        // {
        //     if($product->images)
        //     {
        //         $images = explode(',', $product->images);
        //         foreach($images as $image)
        //         {
        //             if($image)
        //             {
        //                 unlink('assets/imgs/products/'.$image);
        //             }
        //         }
        //     }

        //     $imagesname = '';
        //     foreach($this->newimages as $key=>$image)
        //     {
        //         $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
        //         $image->storeAs('products', $imgName);
        //         $imagesname = $imagesname. ',' . $imgName ;
        //     }
        //     $product->images = $imagesname;
        // }

        $product->category_id = $this->category_id;
        $product->subcategory_id = $this->subcategory_id;
        $product->brand_id = $this->brand_id;
        $product->color = $this->color;
        $product->is_active = $this->is_active;
        // borrando las tallas y cantidades anteriores
        $product->sizes()->delete();
        // añadiendo las tallas y cantidades nuevas
        foreach($this->sizes as $size)
        {
            $product->sizes()->create([
                'size' => $size['size'],
                'quantity' => $size['quantity'],
            ]);
        }
        $product->variant_code = $this->selected_product_vc;
        $product->save();
        $selected_tags_ids = array_column($this->selected_tags, 'id');
        $product->tags()->sync($selected_tags_ids);

        session()->flash('message', 'Producto actualizado exitosamente');
    }

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

    public function removeSize($index)
    {
        unset($this->sizes[$index]);
        $this->sizes = array_values($this->sizes);
    }

    public function removeTag($id)
    {
        $this->selected_tags = array_filter($this->selected_tags, function ($tag) use ($id) {
            return $tag['id'] != $id;
        });
    }

    public function render()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        $brands = Brand::orderBy('name', 'ASC')->get();
        return view('livewire.admin.admin-edit-product-component', compact('categories', 'brands'));
    }
}
