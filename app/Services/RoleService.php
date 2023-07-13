<?php

namespace App\Services;

use App\Services\Contracts\RoleServiceInterface;

class RoleService implements RoleServiceInterface
{
    public function hasRights(string $userType, string $routeName): bool
    {
        return true;
    }
}
