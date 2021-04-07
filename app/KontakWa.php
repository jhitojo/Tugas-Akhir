<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KontakWa extends Model
{
    //
    protected $table='kontak_wa';
    protected $fillable=['user_id','isi_pesan'];
    // protected $fillable=['isi_pesan'];

    public function user_info(){
        return $this->hasOne('App\User','id','user_id');
    }
}
