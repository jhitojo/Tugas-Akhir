<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
<<<<<<< HEAD
    protected $fillable=['name','stock','price','cat_id','photo','user_id'];
=======
    protected $fillable=['name','stock','price','cat_id','photo'];
>>>>>>> 0d9070bea647a728bb23198d30ef4e40ac3ff4eb

    public function cat_info(){
        return $this->hasOne('App\Category','id','cat_id');
    }
<<<<<<< HEAD

    public function user_info(){
        return $this->hasOne('App\User','id','user_id');
    }
=======
>>>>>>> 0d9070bea647a728bb23198d30ef4e40ac3ff4eb
}
