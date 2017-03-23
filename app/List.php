<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class List extends Model
{
    //
    protected $table = "lists";

    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }
    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
