<?php

namespace App\Policies;

use App\Task;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determinar si un usuari donat és propietari d'una determinada tasca.
     *
     * @param User $user
     * @param Task $task
     * @return bool
     */
    public function ownerTask(User $user, Task $task)
    {
        //En interessa saber si l'usuari en concret ($user->id) és propietari d'una tasca en concret, tot gràcies a la
        //relació entre usuari i tasca de la base de dades ($task->user_id).
        return $user->id === $task->user_id;
    }
}
