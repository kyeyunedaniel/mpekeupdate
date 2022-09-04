<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\Produce;

class Carts extends Model
{
    use HasFactory;
     protected $fillable=[
        'user_id',
         'product_id',
         'name',
          'price',
           'quantity',
    ];

    public static function usercartitam(){
    	$usercartitam=Carts::with(['product'=>function($query){
    	    		$query->select('id','name','logo','quantity','price');
    	    	}])->where('user_id',Auth::user()->id)->get()->toArray();
    	return $usercartitam;
    }
    public function product(){
    	return $this->belongsTo('App\Models\Produce','product_id');
    }
}
