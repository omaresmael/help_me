<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolPolicy
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
            if($ability->name == 'إضافة هيئة تعليمية')
                return true;
        }
        return false;
    }
    public function show(User $user)
    {
        $abilities = $user->abilities;
        foreach ($abilities as $ability)
        {
            if($ability->name == 'عرض هيئة تعليمية')
                return true;
        }
        return false;
    }
    public function update(User $user)
    {
        $abilities = $user->abilities;
        foreach ($abilities as $ability)
        {
            if($ability->name == 'تعديل هيئة تعليمية')
                return true;
        }
        return false;
    }
    public function delete(User $user)
    {
        $abilities = $user->abilities;
        foreach ($abilities as $ability)
        {
            if($ability->name == 'حذف هيئة تعليمية')
                return true;
        }
        return false;
    }
}
