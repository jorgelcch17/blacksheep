<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;
use Cart;
use App\Models\Category;
use App\Models\Brand;

class HomeComponent extends Component
{
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Producto añadido al carrito');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $slides = HomeSlider::where('status', 1)->get();
        $lproducts = Product::orderBy('created_at', 'DESC')->get(); // Latest Products for Home Page
        $fproducts = Product::where('featured', 1)->inRandomOrder()->get()->take(8); // products featured
        $pcategories = Category::where('is_popular', 1)->inRandomOrder()->get()->take(4); // cattegories featured
        $brands = Brand::where('status', 1)->inRandomOrder()->get();
         return view('livewire.home-component', compact('slides', 'lproducts', 'fproducts', 'pcategories', 'brands'));
    }
}
