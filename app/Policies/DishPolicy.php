<?php

namespace App\Policies;

use App\User;
use App\Dish;

use Illuminate\Auth\Access\HandlesAuthorization;

class DishPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function vote(User $user, Dish $dish)
    {
        return $user->hasBought($dish);
    }

    public function manage(User $user, Dish $dish)
    {
        return $user->hasRole('Provider');
    }
    
    public function create(User $user, Dish $dish)
    {
        return $user->hasRole('Provider');
    }
    public function store(User $user, Dish $dish)
    {
        return $user->hasRole('Provider');
    }
    public function update(User $user, Dish $dish)
    {
        return $user->hasRole('Provider');
    }
    public function destroy(User $user, Dish $dish)
    {
        return $user->hasRole('Provider');
    }

}
