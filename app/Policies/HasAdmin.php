<?php

namespace RogerFornerTodosBackend\Policies;

/**
 * Class HasAdmin.
 *
 * @package RogerFornerTodosBackend\Policies
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
