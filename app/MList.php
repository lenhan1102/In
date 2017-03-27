<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MList extends Model
{
    //
    protected $table = "m_lists";

    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }
    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
}
