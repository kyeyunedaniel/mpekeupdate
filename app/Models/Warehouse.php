<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;


class Warehouse extends Model
{
    use HasFactory;

    // use SearchableTrait;
        protected $searchable = [
        'columns' => [
        'warehouses.name'  => 10,
        'warehouses.district'   => 10,
        'warehouses.country'   => 10,
        'warehouses.sub_county'    => 10,
        'warehouses.parish'  => 10,
        'warehouses.village'   => 10,
        'warehouses.user_id'  => 10,
        'warehouses.grain_type'   => 10,
        'warehouses.charges'  => 10,
        'warehouses.id'    => 10,
        ]
        ];
     protected $fillable = [
        'name',
        'user_id',
        'district',
        'country',
        'sub_county',
        'parish',
        'village',
        'grain_type',
        'charges',
        'logo'
    ];

    public function manager(){
        return $this->belongsTo(User::class);
    }

}
