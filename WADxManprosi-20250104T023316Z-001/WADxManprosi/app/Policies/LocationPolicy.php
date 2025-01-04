<?php

namespace App\Policies;

use App\Models\User;

class LocationPolicy
{
    /**
     * Create a new policy instance.
     */
    public function view(User $user, Location $location)
    {
        return $location->user_id === $user->id;
    }

    public function delete(User $user, Location $location)
    {
        return $location->user_id === $user->id;
    }

}
