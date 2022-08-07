<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use App\Jobs\PaymentCompleted;
use App\Utils\IPayNow\IPayNow;
// use App\Order;
// use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
// use App\Http\Controllers\FCMController;

class IPayNowController extends Controller
{
    public function init($sn)
    {
        return $sn;
    }


    public function create($payment)
    {
        $payment = [
            'gateway' => 'IPayNow',
            'transaction_ref_no' => 456421321654,
            'transaction_status' => 'Completed',
            'payment_amount' => 18.00,
            'paid_amount' => 18.00,
            'currency_code' => 'NZD'
        ];
        $verified = true;
        if ($verified) {
            $this->dispatch(new PaymentCompleted($payment));
            return true;
        }
    }
}
