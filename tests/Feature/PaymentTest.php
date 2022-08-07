<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_init_ipaynow_redirect_payment()
    {
        $response = $this->get('/api/v1/bills/132123132132/payments/IPayNow/Alipay/redirect');

        $response->assertStatus(200);
    }

    
    public function test_can_receive_payment()
    {
        $response = $this->get('/api/v1/payments/545646126461');

        $response->assertStatus(404);
    }
}

