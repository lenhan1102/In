<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    protected $fillable = ['id', 'created_at', 'updated_at', 'user_id', 'cart', 'address', 'name', 'payment_id', 'status'];

    public function completeCheckout($cart){
        foreach ($cart->items as $id => $item) {
            $dish = Dish::find($id);
            $dish->ordered += $item['qty'];
            $dish->save();
        }
    }
}
