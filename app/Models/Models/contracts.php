<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contracts extends Model
{
    use HasFactory;
     protected $fillable = [
        'warehouse_id',
        'user_id',
        'name',
        'price',
        'quantity',
        'quality',
        'date_available',
        'doc','MaizeType','Land_size','location','maize_status'
    ];

}
