<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reject_reason extends Model
{
    use HasFactory;
     protected $fillable = [        
        'name',
        'description',
    ];
}
