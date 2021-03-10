<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['user_id','total','delivered'];

    public function orderItems()
    {
        return $this->belongsToMany(Product::class,'order_product','product_id','order_id')->withPivot('stock','total');
    }
        public function user() {
            return $this->belongsTo('App\User');
        }
}
