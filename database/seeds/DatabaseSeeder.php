<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsRolesSeeder::class);
        $this->call(UsersTableSeeder::class); //factoria
        $this->call(AdminUserSeeder::class);
    }
}
