<?php

namespace App\Policies;

use App\Models\Item;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {

    }

    public function view(User $user, Item $item): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, Item $item): bool
    {
    }

    public function delete(User $user, Item $item): bool
    {
    }

    public function restore(User $user, Item $item): bool
    {
    }

    public function forceDelete(User $user, Item $item): bool
    {
    }
}
