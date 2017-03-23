<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'menus';
	public function lists()
    {
        return $this->hasMany('App\List');
    }
}
