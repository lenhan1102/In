<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mlist extends Model
{
    //
    protected $table = "mlists";

    public function dishes()
    {
        return $this->hasMany('App\Dish');
    }
    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
    protected $fillable = ['id', 'name', 'menu_id'];
}
