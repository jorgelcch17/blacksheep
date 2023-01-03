<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Size;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $qty=1;

    public $selected_size = null;
    public $qty_for_selected_size = null;

    public function mount($slug){
        $this->slug = $slug;
        $product = Product::where('slug', $slug)->first();
        // calculamos la cantidad de productos disponibles sumando las cantidades de todos los tamaños
        $pquantity = $product->sizes->sum('quantity');
        if($pquantity == 0){
            $this->qty_for_selected_size = 'No disponible';
        }
    }

    public function increaseQuantity(){
        $this->qty++;
    }
    
    public function decreaseQuantity(){
        if($this->qty > 1){
            $this->qty--;
        }
    }

    public function updatedSelectedSize($value){
        // $product = Product::where('slug', $this->slug)->first();
        $size = Size::where('id', $value)->first();
        $this->qty_for_selected_size = $size->quantity;
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, $this->qty, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Producto añadido al carrito');
        return redirect()->route('shop.cart');
    }

    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        $this->emitTo('wishlist-icon-component', 'refreshComponent');
    }

    public function goToVariant($slug)
    {
        // $this->slug = $slug;
        return redirect()->route('product.details', ['slug' => $slug]);
    }

    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        $rproducts = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $nproducts = Product::latest()->take(4)->get();
        $psizes = $product->sizes;
        // obteniendo los productos que tengan el campo variant_code igual al del producto actual y que no sean null
        $pvariants = Product::where('variant_code', $product->variant_code)->get();
        return view('livewire.details-component', compact('product', 'rproducts', 'nproducts', 'psizes', 'pvariants'));
    }
}
