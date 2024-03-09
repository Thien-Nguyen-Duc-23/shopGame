<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function checkAdmin(User $user)
    {
        return $user->role == 'admin' or $user->role == 'super_admin';
    }

    public function checkEditor(User $user)
    {
        return $user->role == 'editor';
    }

    public function checkSale(User $user)
    {
        return $user->role == 'sale';
    }
}
