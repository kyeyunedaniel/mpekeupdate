<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produce extends Model
{
    use HasFactory;
     protected $fillable = [
        'Warehouse_id',
        'user_id',
        'name',
        'price',
        'quantity',
        'Status',
        'quality',
        'Delivery',
        'logo'
    ];
}
