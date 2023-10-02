<?php

namespace App\Policies;

use App\Models\Budget;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BudgetPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isOfficer();
    }

    public function editStatus(User $user, Budget $budget): bool
    {
        if($budget->status == 'inprogress'){
            return true;
        }
        return false;
    }
}
