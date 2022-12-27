<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;

    // usando soft delete
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'mobile_phone',
        'subject',
        'message',
    ];
}
