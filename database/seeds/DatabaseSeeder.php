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
        //Simple seeders
        $this->call(AdminUserSeeder::class);

        //Factories
        $this->call(UsersTableSeeder::class);
    }
}
