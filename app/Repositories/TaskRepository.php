<?php

namespace App\Repositories;

use App\Task;
use App\User;

class TaskRepository
{
    /**
     * Obtenir la llista de totes les tasques d'un usuari en concret.
     *
     * @param User $user
     * @return mixed
     */
    public function forUser(User $user)
    {
        //Consulta a la base de dades.
        return Task::where('user_id', $user->id)
            ->orderBy('created_at', 'asc') //Ordenar la llista de forma ascendent, segons la data de creació.
            //->get(); //Obtenir tota la informació de la db.
            ->paginate(6); //Número de tasques a mostrar per pàgina. Fa la funció del get, pero amb paginació.
    }
}