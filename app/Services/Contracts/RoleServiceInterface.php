<?php

namespace App\Services\Contracts;

interface RoleServiceInterface
{
    public function hasRights(string $userType, string $routeName): bool;
}
