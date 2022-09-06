<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaymentTest extends TestCase
{

    protected $payment;

    public function setUp() :void
    {
        parent::setUp();
        $this->payment = [
            'gateway' => 'IPayNow',
            'transaction_ref_no' => 456421321654,
            'transaction_status' => 'Completed',
            'payment_amount' => 18.00,
            'paid_amount' => 18.00,
            'currency_code' => 'NZD'
        ];
    }

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

    
    public function test_can_store_payment_from_job_queue()
    {
        $this->postJson('/api/v1/payments/4546', $this->payment)->assertStatus(201);
        sleep(3);
        $this->assertDatabaseHas('payments', $this->payment);
    }
}

