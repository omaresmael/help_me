<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
            if($ability == 'إضافة مختص')
                return true;
        }
        return false;
    }
    public function update(User $user)
    {
        $abilities = $user->abilities;
        foreach ($abilities as $ability)
        {

            if($ability->name == 'تعديل مختص')
                return true;
        }
        return false;
    }
    public function delete(User $user)
    {
        $abilities = $user->abilities;
        foreach ($abilities as $ability)
        {
            if($ability->name == 'حذف مختص')
                return true;
        }
        return false;
    }
}
