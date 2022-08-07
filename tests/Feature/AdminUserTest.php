<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminUserTest extends TestCase
{

    protected $admin;
    protected $user;

    public function setUp() :void
    {
        parent::setUp();
        $this->admin = [
            'email' => 'admin@test.co.nz',
            'password' => 'abcd1234'
        ];

        $this->user = [
            'email' => 'tester@test.co.nz',
            'password' => 'abcd1234'
        ];
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_get_all_users()
    {
        $this->postJson('/api/v1/login', $this->admin)
            ->assertStatus(200);
        $this->getJson('/api/v1/admin/users')
            ->assertStatus(200);
    }

    public function test_user_cannot_get_all_users()
    {
        $this->postJson('/api/v1/login', $this->user)
            ->assertStatus(200);
        $this->getJson('/api/v1/admin/users')
            ->assertStatus(401);
    }
}
