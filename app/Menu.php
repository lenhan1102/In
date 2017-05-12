<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'menus';
	public function dishes()
    {
        return $this->hasMany('App\Dish');
    }
    protected $fillable = ['id', 'name'];
}
