<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class item extends Model
{
    protected $fillable = [
        'name', 'user_id', 'category_id', 'name', 'amount', 'text',  'image', 'size', 'customer_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function category()
    {
        return $this->hasMany('App\Category', 'items.category_id', 'categories.id');
    }
}
