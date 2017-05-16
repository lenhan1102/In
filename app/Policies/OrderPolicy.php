<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Order;
use App\User;
use App\Dish;

class OrderPolicy
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
    public function manage(User $user, Order $order)
    {
        return $user->hasRole('Provider');
    }
}
