<?php

namespace App\Policies;

use App\Models\Organizer;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Request;

class OrganizerPolicy
{
    public function viewAndCreate(User $user): bool
    {
        return $user->isMember();
    }

    public function manageEvent(User $user)
    {
        if($user->isMember()){
            return true;
        }
        else{
            return false;
        }
    }
}
