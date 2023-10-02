<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EventPolicy
{
    public function apply(User $user, Event $event)
    {
        if($user->isMember()){
            return !$user->applications()->where('event_id', $event->id)->exists();
        }
        else if($user->isOfficer()){
            return false;
        }
    }

    public function viewRegistered(User $user): bool
    {
        return $user->isMember();
    }
}
