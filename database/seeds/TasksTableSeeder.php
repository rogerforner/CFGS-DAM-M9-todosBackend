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
        factory(RogerFornerTodosBackend\User::class, 3)->create()->each(function ($user) {
            $user->tasks()->saveMany(
                factory(RogerFornerTodosBackend\Task::class, 1)->create(['user_id' => $user->id])
            );
        });
    }
}
