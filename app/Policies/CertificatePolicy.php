<?php

namespace App\Policies;

use App\Models\Certificate;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CertificatePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isMember();
    }
}
