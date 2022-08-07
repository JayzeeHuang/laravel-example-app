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
    protected $credantials;

    public function setUp() :void
    {
        parent::setUp();
        $this->data = [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail()
        ];
        $this->credantials = array_merge($this->data, ['password' => $this->faker->password()]);
    }

    public function test_can_register_user()
    {
        $this->postJson('/api/v1/register', $this->credantials)
            ->assertStatus(201);
        $this->assertDatabaseHas('users', $this->data);
    }

    // public function test_can_not_register_duplicate_user_email()
    // {
    //     $this->postJson('/api/v1/register', $this->credantials)
    //         ->assertStatus(201);
    //     $this->assertDatabaseHas('users', $this->data);
    //     $this->postJson('/api/v1/register', $this->credantials)
    //         ->assertStatus(422)->dump()
    //         ->assertJson(['message' => 'The email has already been taken.']);
    // }

    public function test_can_show_user()
    {
        $this->postJson('/api/v1/register', $this->credantials)
            ->assertStatus(201);
        $this->getJson('/api/v1/user')
            ->assertStatus(200)
            ->assertJson(['email' => $this->data['email']]);
    }


    public function test_can_update_user()
    {
        $response = $this->postJson('/api/v1/register', $this->credantials)
            ->assertStatus(201);
        $this->data['name'] = 'Jayzee';
        $this->patchJson('/api/v1/user', $this->data)
            ->assertStatus(200)
            ->assertJson(['name' => $this->data['name'],'email' => $this->data['email']]);
    }

    public function test_can_destroy_user()
    {
        $this->postJson('/api/v1/register', $this->credantials)
            ->assertStatus(201);
        $this->deleteJson('/api/v1/user')
        ->assertStatus(200);
        $this->assertDatabaseMissing('users', [
            'email' => $this->data['email'],
        ]);
    }

    // public function 

}
