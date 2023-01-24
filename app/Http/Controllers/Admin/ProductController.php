<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function files($product_id, Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048',
        ]);
        // obtenemos el producto
        $product = Product::find($product_id);
        // $imgName = Carbon::now()->timestamp .'.' . $request->file->extension();
        $imgName = Carbon::now()->timestamp . '_' . rand(100, 999) . '.' . $request->file->extension();
        $request->file->storeAs('products', $imgName);
        // guardamos la imagen en la tabla de productos en el campo images concatenandolo a lo que ya hay
        $product->images = $product->images . ',' . $imgName;
        // eliminamos la primera coma
        $product->images = trim($product->images, ',');
        $product->save();
    }
}
