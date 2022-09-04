<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporter extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'password',
        'user_id',
        'image',
        'category','description','location'
    ];
}
