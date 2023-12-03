<?php

namespace App\Policies;

use App\Models\Section;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SectionPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    public function view(User $user, Section $section): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Section $section): bool
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, Section $section): bool
    {
        return $user->hasRole('admin');
    }

    public function restore(User $user, Section $section): bool
    {
        return $user->hasRole('admin');
    }

    public function forceDelete(User $user, Section $section): bool
    {
        return $user->hasRole('admin');
    }
}
