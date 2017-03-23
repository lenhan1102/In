<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //
	protected $table = 'dishes';
	public function list()
    {
        return $this->belongsTo('App\List');
    }
    public function images()
    {
        return $this->hasMany('App\Image');
    }
    protected $fillable = ['name'];
}
