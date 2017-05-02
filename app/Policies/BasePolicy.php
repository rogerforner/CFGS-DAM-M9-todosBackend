<?php

namespace RogerForner\TodosBackend\Policies;

use RogerForner\TodosBackend\Task;
use RogerForner\TodosBackend\User;

/**
 * Class BasePolicy.
 *
 * @package RogerForner\TodosBackend\Policies
 */
abstract class BasePolicy
{
    abstract protected function model();
    /**
     * Determine whether the user can list the tasks.
     *
     * @param  \RogerForner\TodosBackend\User  $user
     * @return mixed
     */
    public function show(User $user)
    {
        if ($user->hasPermissionTo('show-' . $this->model())) return true;
    }
    /**
     * Determine whether the user can view the task.
     *
     * @param  \RogerForner\TodosBackend\User  $user
     * @param  \RogerForner\TodosBackend\Task  $task
     * @return mixed
     */
    public function view(User $user, Task $task)
    {
        if ($user->hasPermissionTo('view-' . $this->model())) return true;
    }
    /**
     * Determine whether the user can create tasks.
     *
     * @param  \RogerForner\TodosBackend\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasPermissionTo('create-' . $this->model())) return true;
    }
    /**
     * Determine whether the user can update the task.
     *
     * @param  \RogerForner\TodosBackend\User  $user
     * @param  \RogerForner\TodosBackend\Task  $task
     * @return mixed
     */
    public function update(User $user, Task $task)
    {
        if ($user->hasPermissionTo('update-' . $this->model())) return true;
    // if ($user->isAdmin()) return true;
    // if ($user->hasRole('editor')) return true;
    // return $user->id == $task->user_id;
    }
    /**
     * Determine whether the user can delete the task.
     *
     * @param  \RogerForner\TodosBackend\User  $user
     * @param  \RogerForner\TodosBackend\Task  $task
     * @return mixed
     */
    public function delete(User $user, Task $task)
    {
        if ($user->hasPermissionTo('delete-' . $this->model())) return true;
    }

}
