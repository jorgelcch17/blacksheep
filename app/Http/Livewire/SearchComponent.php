<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\tag;

class SearchComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $orderBy = 'por defecto';

    public $q;
    public $search_term;

    public $min_value = 0;
    public $max_value = 1000;

    public function mount()
    {
        $this->fill(request()->only('q'));
        $this->search_term = '%'.$this->q.'%';
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Producto añadido al carrito');
        return redirect()->route('shop.cart');
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

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }

    public function render()
    {
        if($this->orderBy == 'Precio: Bajo a alto')
        {
            $products = Product::where('name', 'like', $this->search_term)->orderBy('regular_price', 'ASC')->paginate($this->pageSize);    
        }elseif($this->orderBy == 'Precio: Alto a bajo'){
            $products = Product::where('name', 'like', $this->search_term)->orderBy('regular_price', 'DESC')->paginate($this->pageSize);  
        }elseif($this->orderBy == 'mas recientes'){
            $products = Product::where('name', 'like', $this->search_term)->orderBy('created_at', 'DESC')->paginate($this->pageSize);
        }else{
            $products = Product::where('name', 'like', $this->search_term)->paginate($this->pageSize);
        }

        $categories = Category::orderBy('name', 'ASC')->get();
        $nproducts = Product::latest()->take(4)->get();
        $tags = Tag::all();
        return view('livewire.search-component', compact('products', 'categories', 'tags','nproducts'));
    }
}
