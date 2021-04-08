<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['status_pembayaran'];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function order_detail()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
