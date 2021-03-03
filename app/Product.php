<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','stock','price','cat_id','photo'];

    public function cat_info(){
        return $this->hasOne('App\Category','id','cat_id');
    }
}
