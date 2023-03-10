<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Tag;


class ShopComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $orderBy = 'por defecto';

    public $min_value = 0;
    public $max_value = 1000;

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
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
        if($this->orderBy == 'Precio: Bajo a alto')
        {
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('is_active', 1)->orderBy('regular_price', 'ASC')->paginate($this->pageSize);    
        }elseif($this->orderBy == 'Precio: Alto a bajo'){
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('is_active', 1)->orderBy('regular_price', 'DESC')->paginate($this->pageSize);  
        }elseif($this->orderBy == 'mas recientes'){
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('is_active', 1)->orderBy('created_at', 'DESC')->paginate($this->pageSize);
        }else{
            $products = Product::whereBetween('regular_price', [$this->min_value, $this->max_value])->where('is_active', 1)->paginate($this->pageSize);
        }

        $categories = Category::orderBy('name', 'ASC')->get();
        $nproducts = Product::latest()->where('is_active', 1)->take(4)->get();
        $tags = Tag::all();
        return view('livewire.shop-component', compact('products', 'categories', 'nproducts', 'tags'));    
    }
}
