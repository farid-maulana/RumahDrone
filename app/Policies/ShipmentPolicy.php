<?php

namespace App\Policies;

use App\Models\Shipment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ShipmentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Shipment $shipment): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Shipment $shipment): bool
    {
    }

    public function delete(User $user, Shipment $shipment): bool
    {
    }

    public function restore(User $user, Shipment $shipment): bool
    {
    }

    public function forceDelete(User $user, Shipment $shipment): bool
    {
    }
}
