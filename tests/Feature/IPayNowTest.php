<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IPayNowTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_use_ipaynow_alipay_checkout()
    {
        $response = $this->getJson('/api/v1/IPayNow/Alipay/checkout/234803294802358092538520')
            ->assertStatus(200);
        $this->assertArrayHasKey('redirectUrl', $response);
    }

}
