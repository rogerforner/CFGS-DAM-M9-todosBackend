<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Spatie\Permission\Models\Role;

class TasksControllerTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @group failing
     */
    public function testAuthorizedIndex()
    {
        //1 Preparation
        $user = $this->login();

        Role::create(["name" => "admin"]);
        $user->assignRole('admin');

        //2 Execució
        $this->get('tasks');

        //3 Asserts
        $this->assertResponseOk();
    }

    /**
     *
     */
    public function testNotAuthorizedIndex()
    {
        //1 Preparation
        $this->login();

        //2 Execució
        $this->get('tasks');

        //3 Asserts
        $this->assertResponseStatus(403);
    }


    protected function login()
    {
        $user = factory(\App\User::class)->create();
        $this->actingAs($user);
    }
}
