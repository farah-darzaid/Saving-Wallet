<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
//    public function user()
//    {
//        return $this->belongsTo('App\User');
//    }

    public function transaction()
    {
        return $this->belongsTo('App\Transaction');
    }
}
