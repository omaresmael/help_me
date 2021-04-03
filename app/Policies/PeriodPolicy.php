<?php

namespace App\Policies;

use App\Models\Period;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PeriodPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        $abilities = $user->abilities;
        foreach ($abilities as $ability)
        {
            if($ability->name == 'إضافة دفعة')
                return true;
        }
        return false;
    }
    public function update(User $user)
    {
        $abilities = $user->abilities;
        foreach ($abilities as $ability)
        {
            if($ability->name == 'تعديل دفعة')
                return true;
        }
        return false;
    }
    public function delete(User $user)
    {
        $abilities = $user->abilities;
        foreach ($abilities as $ability)
        {
            if($ability->name == 'حذف دفعة')
                return true;
        }
        return false;
    }
}
