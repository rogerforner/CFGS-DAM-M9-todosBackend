<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

/**
 * Class AdminUsersSeeder
 */
class AdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            /**
             * Factoria.
             *
             * Guardem la factoria en la variable $user per tal de poder-li
             * assignar el rol que crearem més endavant.
             */
            $user = factory(RogerFornerTodosBackend\User::class)->create([
                    "name" => "Roger Forner Fabre",
                    "email" => "sir.rogerforner@gmail.com",
                    "password" => bcrypt(env('ADMIN_PWD', '123456'))]
            );

            /**
             * Rol.
             *
             * Assignem el rol admin, el qual hem creat al seed PermissionsRolesSeeder.php
             */
            $user->assignRole('admin');

        } catch (\Illuminate\Database\QueryException $exception) {

        }
    }
}