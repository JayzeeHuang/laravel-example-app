<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminBillTest extends TestCase
{

    protected $admin;

    public function setUp() :void
    {
        parent::setUp();
        $this->admin = [
            'email' => 'admin@test.co.nz',
            'password' => 'abcd1234'
        ];
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_get_all_bills()
    {
        $this->postJson('/api/v1/login', $this->admin)
            ->assertStatus(200);
        $this->getJson('/api/v1/admin/bills')
            ->assertStatus(200);
    }

}
