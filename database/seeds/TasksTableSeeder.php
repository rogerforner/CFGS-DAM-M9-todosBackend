<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RogerForner\TodosBackend\User::class, 3)->create()->each(function ($user) {
            $user->tasks()->saveMany(
                factory(RogerForner\TodosBackend\Task::class, 1)->create(['user_id' => $user->id])
            );
        });
    }
}
