<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShippingType extends Model
{
    use HasFactory;

    // usando soft delete
    use SoftDeletes;

    // relacion muchos a muchos con la tabla cities
    public function cities()
    {
        return $this->belongsToMany(City::class)->withPivot('price', 'details');
    }
}
