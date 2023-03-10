<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // relacion con subcategories
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    // relacion con brands
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    // relacion con sizes
    public function sizes()
    {
        return $this->hasMany(Size::class, 'product_id');
    }

    // relacion con tags    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
