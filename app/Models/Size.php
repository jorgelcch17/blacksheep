<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table = 'sizes';

    protected $fillable = [
        'size',
        'quantity',
        'product_id',
    ];

    // relacion con products

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
