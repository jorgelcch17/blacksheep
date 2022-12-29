<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
