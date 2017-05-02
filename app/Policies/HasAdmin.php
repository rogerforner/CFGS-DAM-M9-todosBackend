<?php

namespace RogerForner\TodosBackend\Policies;

/**
 * Class HasAdmin.
 *
 * @package RogerForner\TodosBackend\Policies
 */
trait HasAdmin
{
    /**
     * @param $user
     * @param $ability
     * @return bool
     */
    public function before($user, $ability)
    {
        if ($user->hasRole('admin')) return true;
    }
}
