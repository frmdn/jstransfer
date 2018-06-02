<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function metode()
    {
        return $this->belongsTo('App\Metode');
    }
}
