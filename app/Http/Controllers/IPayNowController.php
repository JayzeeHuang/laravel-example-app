<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\PaymentCompleted;
// use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class IPayNowController extends Controller
{
    public function init($sn)
    {
        return $sn;
    }


    public function create(Request $request, $payment)
    {
        $verified = true;
        if ($verified) {
            PaymentCompleted::dispatch($request->all());
            return response()->json($request, 201);
        }
    }
}
