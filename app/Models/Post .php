<?php

  

namespace App\Models;  

use Illuminate\Database\Eloquent\Model;

  

class Post extends Model

{

    protected $fillable = ['name','cat','description'];

  

    /**

     * Set the categories

     *

     */

    public function setCatAttribute($value)

    {

        $this->attributes['cat'] = json_encode($value);

    }

  

    /**

     * Get the categories

     *

     */

    public function getCatAttribute($value)

    {

        return $this->attributes['cat'] = json_decode($value);

    }

}