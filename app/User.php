<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\Authenticable;
use Illuminate\Auth\Authenticable as AuthenticableTrait;

class User extends Model implements AuthenticatableContract,
AuthorizableContract,
CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'username', 'password', 'gender', 'birthday', 'address', 'phone', 'remember_token', 'avatar'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function social_accounts()
    {
        return $this->hasMany('App\socialAccount');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
    
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
    
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($role)) {
                return true;
            }
        }
        return false;    
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    public function getRole(){
        $all_roles = '';
        foreach ($this->roles as $role) {
            $all_roles .= $role->name.' ';
        }
        return $all_roles;
    }

    public function getAvatar(){
        if (count($this->social_accounts)) {
            return $this->attributes['avatar'];
        } else {
            return count($this->attributes['avatar'])? asset("images/avatars/" .$this->id. '/'.$this->attributes['avatar']) : asset("images/avatars/" ."default.jpg");
        }
    }

    public function hasBought(Dish $dish){
        $orders = $this->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        foreach ($orders as $order) {
            foreach($order->cart->items as $item){
                if ($item['item']['id'] == $dish->id) {
                    return true;
                }
            }
        }
        return false;
    }
}
