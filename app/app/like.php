<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    protected $fillable = [
        'name', 'user_id', 'item_id'
    ];

    public function user()
    {

        return $this->hasMany('App\item');
    }
    public function item()
    {

        return $this->hasMany('App\user');
    }
}
