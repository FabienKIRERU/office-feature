<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\AuthRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements AuthRepositoryInterface {
    
    public function getAll(): Collection {
        return User::all();
    }

    public function findById(int $id): ?User {
        return User::findOrFail($id);
    }

    public function findByEmail(string $email): ?User {
        return User::where('email', $email)->first();
    }

    public function create(array $data): User {
        return User::create($data);
    }

    public function update(User $user, array $data): User {
        $user->update($data);
        return $user;
    }

    public function delete(User $user): bool {
        return $user->delete();
    }
}
