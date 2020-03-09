<?php

namespace App\Policies;

use App\User;
use App\Vehicle;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehiclePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the vehicle.
     *
     * @param  \App\User  $user
     * @param  \App\Vehicle  $vehicle
     * @return mixed
     */

    public function update(User $user, Vehicle $vehicle)
    {
        if ($vehicle->marina_id === null) {
            return true;
        }
        return  $user->id == $vehicle->marina_id;
    }
}
