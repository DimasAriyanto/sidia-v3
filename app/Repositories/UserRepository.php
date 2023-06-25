<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public static function getAllUsers()
    {
        return User::all();
    }

    public static function getUserById($userId)
    {
        return User::findOrFail($userId);
    }

    public static function createUser($userData)
    {
        return User::create($userData);
    }

    public static function updateUser($userId, $userData)
    {
        $user = self::getUserById($userId);
        $user->update($userData);

        return $user;
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
