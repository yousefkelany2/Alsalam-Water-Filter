<?php

namespace App\Policies;

use App\Models\Dashboard\Admin\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function create(Admin $authUser): bool
    {
        return $authUser->isSuperAdmin();
    }

    public function update(Admin $authUser, Admin $targetAdmin): bool
    {
        return $authUser->isSuperAdmin() || $authUser->id === $targetAdmin->id;
    }

    public function delete(Admin $authUser, Admin $targetAdmin): bool
    {
        return $authUser->isSuperAdmin() || $authUser->id === $targetAdmin->id;
    }

    public function restore(Admin $authUser, Admin $targetAdmin): bool
    {
        return $authUser->isSuperAdmin();
    }

    public function forceDelete(Admin $authUser, Admin $targetAdmin): bool
    {
        return $authUser->isSuperAdmin();
    }
}
