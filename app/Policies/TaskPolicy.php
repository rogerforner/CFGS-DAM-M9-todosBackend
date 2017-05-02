<?php

namespace RogerForner\TodosBackend\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class TaskPolicy.
 *
 * @package RogerForner\TodosBackend\Policies
 */
class TaskPolicy extends BasePolicy
{
    use HandlesAuthorization,HasAdmin;

    /**
     * @return string
     */
    protected function model()
    {
        return 'task';
    }
}
