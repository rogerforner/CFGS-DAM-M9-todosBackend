<?php

namespace RogerFornerTodosBackend\Policies;

use RogerFornerTodosBackend\Task;
use RogerFornerTodosBackend\User;

/**
 * Class BasePolicy.
 *
 * @package RogerFornerTodosBackend\Policies
 */
abstract class BasePolicy
{
    abstract protected function model();
    /**
     * Determine whether the user can list the tasks.
     *
     * @param  \RogerFornerTodosBackend\User  $user
     * @return mixed
     */
    public function show(User $user)
    {
        if ($user->hasPermissionTo('show-' . $this->model())) return true;
    }
    /**
     * Determine whether the user can view the task.
     *
     * @param  \RogerFornerTodosBackend\User  $user
     * @param  \RogerFornerTodosBackend\Task  $task
     * @return mixed
     */
    public function view(User $user, Task $task)
    {
        if ($user->hasPermissionTo('view-' . $this->model())) return true;
    }
    /**
     * Determine whether the user can create tasks.
     *
     * @param  \RogerFornerTodosBackend\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->hasPermissionTo('create-' . $this->model())) return true;
    }
    /**
     * Determine whether the user can update the task.
     *
     * @param  \RogerFornerTodosBackend\User  $user
     * @param  \RogerFornerTodosBackend\Task  $task
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
     * @param  \RogerFornerTodosBackend\User  $user
     * @param  \RogerFornerTodosBackend\Task  $task
     * @return mixed
     */
    public function delete(User $user, Task $task)
    {
        if ($user->hasPermissionTo('delete-' . $this->model())) return true;
    }

}
