<?php

use App\Models\Product;

function discount($item)
{
    $product = Product::find($item->id);
    // restando la cantidad de productos comprados a la cantidad de productos disponibles
    $size = $product->sizes->where('id', $item->options->code_size)->first();
    // dd($size);
    $qty_added = $item->qty;
    $qty_available = $size->quantity;
    $qty_new = $qty_available - $qty_added;
    $size->quantity = $qty_new;
    $size->save();
}