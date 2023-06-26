<?php

namespace App\Repositories\Contracts;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{
    public function create(array $data): User;

    public function getAll(): Collection;

    public function getById(int $id): User;

    public function getByUsername(string $username): User;

    public function update(int $id, array $data);

    public function delete(int $id);
}
