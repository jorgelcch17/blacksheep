<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Subcategory;
use App\Models\Tag;

class CategoryComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $orderBy = 'por defecto';
    public $category_slug;
    public $scategory_slug;

    public $min_value = 0;
    public $max_value = 1000;

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Producto añadido al carrito');
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }

    public function mount($category_slug, $scategory_slug=null){
        $this->category_slug = $category_slug;  
        $this->scategory_slug = $scategory_slug; 
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }

    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-icon-component', 'refreshComponent');
                return;
            }
        }
    }

    public function render()
    {
        $category_id = null;
        $category_name = "";
        $filter = "";
        if($this->scategory_slug)
        {
            $scategory = Subcategory::where('slug', $this->scategory_slug)->first();

            $category_id = $scategory->id;
            $category_name = $scategory->name;
            $filter = "sub";
        }
        else
        {
            $category = Category::where('slug', $this->category_slug)->first();
            $category_id = $category->id;
            $category_name = $category->name;
            $filter = "";
        }

        // $category = Category::where('slug', $this->category_slug)->first();
        if($this->orderBy == 'Precio: Bajo a alto')
        {
            $products = Product::where($filter.'category_id', $category_id)->orderBy('regular_price', 'ASC')->where('is_active', 1)->paginate($this->pageSize);    
        }elseif($this->orderBy == 'Precio: Alto a bajo'){
            $products = Product::where($filter.'category_id', $category_id)->orderBy('regular_price', 'DESC')->where('is_active', 1)->paginate($this->pageSize);  
        }elseif($this->orderBy == 'mas recientes'){
            $products = Product::where($filter.'category_id', $category_id)->orderBy('created_at', 'DESC')->where('is_active', 1)->paginate($this->pageSize);
        }else{
            $products = Product::where($filter.'category_id', $category_id)->where('is_active', 1)->paginate($this->pageSize);
        }

        $categories = Category::orderBy('name', 'ASC')->get();
        $tags = Tag::all();
        $nproducts = Product::latest()->take(4)->get();
        return view('livewire.category-component', compact('products', 'categories', 'category_name', 'tags', 'nproducts'));
    }
}
