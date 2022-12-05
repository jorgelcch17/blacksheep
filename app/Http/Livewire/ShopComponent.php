<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Cart;

class ShopComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $orderBy = 'por defecto';

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

    public function render()
    {
        if($this->orderBy == 'Precio: Bajo a alto')
        {
            $products = Product::orderBy('regular_price', 'ASC')->paginate($this->pageSize);    
        }elseif($this->orderBy == 'Precio: Alto a bajo'){
            $products = Product::orderBy('regular_price', 'DESC')->paginate($this->pageSize);  
        }elseif($this->orderBy == 'mas recientes'){
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->pageSize);
        }else{
            $products = Product::paginate($this->pageSize);
        }
        return view('livewire.shop-component', compact('products'));
    }
}
