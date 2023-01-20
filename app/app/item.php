<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable = [
        'name', 'user_id', 'category_id', 'name', 'amount', 'text',  'image', 'size'
    ];

    public function user(){
        return $this->belongTo('App/user', 'user_id', 'id');
    }
}
