<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nagotiation extends Model
{
    use HasFactory;
    protected $fillable = [
        'contract_id',
        'buyer_id',
        'seller_id',
        'farmer_price',
        'buyer_price',
        'buyer_reason',
        'farmer_reason',
        'nagotiator',
    ];
}
