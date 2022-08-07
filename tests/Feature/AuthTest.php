<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{

    protected $data;

    public function setUp() :void
    {
        parent::setUp();
        $this->data = [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail()
        ];
        $this->credantials = array_merge($this->data, ['password' => $this->faker->password()]);
    }

    /**
     * 
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_login_by_email()
    {
        $this->postJson('/api/v1/register', $this->credantials)
            ->assertStatus(201);
        $this->postJson('/api/v1/login', $this->credantials)
            ->assertStatus(200)
            ->assertJson(['status' => 'success']);
    }


    public function test_can_logout()
    {
        $response = $this->postJson('/api/v1/register', $this->credantials)
            ->assertStatus(201);
        $token = json_decode($response->getContent())->token;
        $this->getJson('/api/v1/logout?token=' . $token)
            ->assertJson(['status' => 'success']);
    }
}
