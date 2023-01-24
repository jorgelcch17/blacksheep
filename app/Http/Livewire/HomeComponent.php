<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{
    public $tabs = 2;

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Producto añadido al carrito');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $slides = HomeSlider::where('status', 1)->get();
        $lproducts = Product::orderBy('created_at', 'DESC')->where('is_active', 1)->get(); // Latest Products for Home Page
        $fproducts = Product::where('featured', 1)->where('is_active', 1)->inRandomOrder()->get()->take(8); // products featured
        $popular_products = Product::inRandomOrder()->where('is_active', 1)->get()->take(8); /* obteniendo 8 productos aleatorios */
        // obteniendo los ultimo 8 productos recientes
        $recent_products = Product::orderBy('created_at', 'DESC')->where('is_active', 1)->get()->take(8);
        $pcategories = Category::where('is_popular', 1)->inRandomOrder()->get()->take(7); // cattegories featured
        $brands = Brand::where('status', 1)->inRandomOrder()->get();

        if($fproducts->count() > 0)
        {
            $this->tabs = 1;
        }

        // resturando el carrito de compras y deseos en caso de que el usuario este autenticado
        // if(Auth::check())
        // {
        //     Cart::instance('cart')->restore(Auth::user()->email);
        //     Cart::instance('wishlist')->restore(Auth::user()->email);
        // }
         return view('livewire.home-component', compact('slides', 'lproducts', 'fproducts', 'pcategories', 'brands', 'popular_products', 'recent_products'));
    }
}
