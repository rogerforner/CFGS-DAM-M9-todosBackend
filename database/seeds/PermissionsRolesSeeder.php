<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Permisos.
         * Creem els permisos.
         */
        //Tasks
        Permission::create(['name' => 'show-tassk']);
        Permission::create(['name' => 'view-task']);
        Permission::create(['name' => 'create-task']);
        Permission::create(['name' => 'update-task']);
        Permission::create(['name' => 'delete-task']);
        //Users
        Permission::create(['name' => 'show-user']);
        Permission::create(['name' => 'view-user']);
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'delete-user']);

        /**
         * Rols.
         * Creem els rols i els hi assignem permisos.
         */
        $role = Role::create(['name' => 'admin']);

        $role->givePermissionTo('show-tassk');   //task
        $role->givePermissionTo('view-task');
        $role->givePermissionTo('create-task');
        $role->givePermissionTo('update-task');
        $role->givePermissionTo('delete-task');
        $role->givePermissionTo('show-user');   //user
        $role->givePermissionTo('view-user');
        $role->givePermissionTo('create-user');
        $role->givePermissionTo('update-user');
        $role->givePermissionTo('delete-user');
    }
}