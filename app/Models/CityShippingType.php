<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityShippingType extends Model
{
    use HasFactory;

    protected $table = 'city_shipping_type';

    // relacion con la tabla ciudades
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // relacion con la tabla tipos de envio
    public function shippingType()
    {
        return $this->belongsTo(ShippingType::class);
    }
}
