<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    protected $data;

    public function setUp() :void
    {
        parent::setUp();
        $this->data = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => $this->faker->password
        ];
    }

    public function test_can_store_user()
    {
        $this->postJson('/api/v1/user', $this->data)
            ->assertStatus(201);
        $this->assertDatabaseHas('users', $this->data);
    }

    public function test_can_show_user()
    {
        $this->postJson('/api/v1/user', $this->data)
            ->assertStatus(201);
        $this->getJson('/api/v1/users/' . $this->data['email'])
            ->assertStatus(200)
            ->assertJson(['email' => $this->data['email']]);

    }


    public function test_can_update_user()
    {
        $this->postJson('/api/v1/user', $this->data)
            ->assertStatus(201);
        $this->data['name'] = 'Jayzee';
        $this->patchJson('/api/v1/users/' . $this->data['email'], $this->data)
            ->assertStatus(200)
            ->assertJson(['name' => $this->data['name'],'email' => $this->data['email']]);
    }

    public function test_can_destroy_user()
    {
        $this->postJson('/api/v1/user', $this->data)
            ->assertStatus(201);
        $this->deleteJson('/api/v1/users/' . $this->data['email'])
        ->assertStatus(200);
        $this->assertDatabaseMissing('users', [
            'email' => $this->data['email'],
        ]);
    }
}
