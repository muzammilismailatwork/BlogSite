<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{

    /**
     * Determine whether the user can view the page.
     */
    public function view_page(User $user): bool
    {
        return $user->admin;
    }
    public function view_subscription(User $user): bool
    {
        return $user->admin;
    }
    public function view_category(User $user): bool
    {
        return $user->admin;
    }
}
