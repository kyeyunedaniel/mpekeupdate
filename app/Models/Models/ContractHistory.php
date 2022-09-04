<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'contract_id',
        'suggest_price',
        'quality',
        'quantity',
        'price',
        'contract_pdt_name'
    ];
}
