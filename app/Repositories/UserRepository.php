<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(): Collection
    {
        return User::all();
    }

    public function getById(int $id): User|null
    {
        return User::find($id);
    }

    public function getByUsername(string $username): User|null
    {
        return User::where('username', $username)->first();
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(User $user, array $data)
    {
        $user->update($data);

        return $user;
    }

    public function delete(User $user)
    {
        $user->delete();

        return $user;
    }

    public static function countAll()
    {
        return User::count();
    }
}
