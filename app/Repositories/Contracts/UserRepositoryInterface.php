<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function getAll(): Collection;

    public function getById(int $id): User|null;

    public function getByUsername(string $username): User|null;

    public function create(array $data): User;

    public function update(User $user, array $data);

    public function delete(User $user);
}
