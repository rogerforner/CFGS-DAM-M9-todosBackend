<?php

namespace RogerForner\TodosBackend\Repositories;

use RogerForner\TodosBackend\Task;
use RogerForner\TodosBackend\User;

class UserTasksRepository
{
    /**
     * @param $id
     * @param array $columns
     *
     * @return mixed
     */
    public function findOrFail($id_user,$id_task, $columns = ['*'])
    {
        $user = User::findOrFail($id_user);

        return $user->tasks()->findOrFail($id_task);
    }
    public function paginate($id, $perPage = 15, $columns = array('*'))
    {
        $user = User::findOrFail($id);

        return $user->tasks()->paginate($perPage);
    }
    public function create(array $data, $id)
    {
        User::findOrFail($id);
        Task::create($data);
    }
    public function update(array $data, $iduser, $idtask)
    {
        $user = User::findOrFail($iduser);
        $task = $user->tasks()->findOrFail($idtask);
        $task->update($data);
    }
    public function delete($iduser,$idtask)
    {
        $user = User::findOrFail($iduser);
        $task = $user->tasks()->findOrFail($idtask);
        $task->delete();
    }
}