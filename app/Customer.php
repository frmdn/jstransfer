<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }
}
