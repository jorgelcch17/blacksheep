<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;

class AdminProductComponent extends Component
{
    use WithPagination;

    public $product_id;

    public function deleteProduct()
    {
        $product = Product::find($this->product_id);
        unlink('assets/imgs/products/'.$product->image);
        $product->delete();
        session()->flash('message', 'Producto eliminado exitosamente!');
    }

    public function changeStatus($id)
    {
        $product = Product::find($id);
        if($product->is_active == 1){
            $product->is_active = 0;
        }else{
            $product->is_active = 1;
        }
        $product->save();
        session()->flash('message', 'El estado del producto ha sido cambiado');
    }

    public function render()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('livewire.admin.admin-product-component', compact('products'));
    }
}
