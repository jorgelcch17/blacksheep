<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function shippingAddresses()
    {
        return $this->hasMany(ShippingAddress::class);
    }

    // relacion muchos a muchos con la tabla shipping_types
    public function shippingTypes()
    {
        return $this->belongsToMany(ShippingType::class)->withPivot('price', 'details');
    }

    // relacion con la tabla CityShippingType
    public function cityShippingType()
    {
        return $this->hasMany(CityShippingType::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
