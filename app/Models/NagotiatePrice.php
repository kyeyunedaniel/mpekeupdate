<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NagotiatePrice extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'price',
        'reason',
    ];
}
