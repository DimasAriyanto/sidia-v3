<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface
{
    public function getAll(): Collection
    {
        return User::all();
    }

    public function getById(int $userId): User
    {
        return User::find($userId);
    }

    public function getByUsername(string $username): User
    {
        return User::where('username', $username)->first();
    }

    public function create(array $data): User
    {
        return User::create($data);
    }

    public function update(User $user, array $data): bool
    {
        return $user->update($data);
    }

    public static function deleteUser($userId)
    {
        $user = self::getUserById($userId);

        return $user->delete();
    }

    public static function countAll()
    {
        return User::count();
    }
}
