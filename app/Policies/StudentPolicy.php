<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
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
            if($ability == 'إضافة طالب')
                return true;
        }
        return false;
    }
    public function show(User $user)
    {
        $abilities = $user->abilities;
        foreach ($abilities as $ability)
        {
            if($ability->name == 'عرض طالب')
                return true;
        }
        return false;
    }
    public function update(User $user)
    {
        $abilities = $user->abilities;
        foreach ($abilities as $ability)
        {
            if($ability->name == 'تعديل طالب')
                return true;
        }
        return false;
    }
    public function delete(User $user)
    {
        $abilities = $user->abilities;
        foreach ($abilities as $ability)
        {
            if($ability->name == 'حذف طالب')
                return true;
        }
        return false;
    }
}
