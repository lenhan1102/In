<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //
	protected $table = 'dishes';
	public function mlist()
    {
        return $this->belongsTo('App\MList');
    }
    public function images()
    {
        return $this->hasMany('App\Image');
    }
    protected $fillable = ['name', 'price', 'description'];
}
