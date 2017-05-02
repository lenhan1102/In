<?php

namespace App;
use App\User;
use App\Dish;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //
    protected $table = 'votes';
	public function user(){
		return $this->belongsTo('App\User');
	}
	public function dish(){
		return $this->belongsTo('App\Dish');
	}
	protected $fillable = ['user_id', 'dish_id', 'voted'];
}
