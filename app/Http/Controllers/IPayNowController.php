<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use App\Utils\IPayNow;
// use App\Order;
// use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
// use App\Http\Controllers\FCMController;

class IPayNowController extends Controller
{
    public function Alipay($sn)
    {
        $IPayNow = new IPayNow();
        // $IPayNow->setApiId('payment.appId')
        //     ->setSecretKey('payment.secure_key')
        $IPayNow->setRedirectUrl('http://www.mytest.co.nz/shop/completepayment')
            ->setNotifyUrl('http://www.mytest.co.nz/shop/notifypayment')
            ->setDisplayName('My company name')
            ->setOrderDescription('seller name')
            ->setOrderNumber(1564654564564654564)
            ->setProductDetail([['name' => '$order->items->toArray()', 'quantity' => 8]])
            ->setOrderAmount(666.00 * (1 + 0.025))
            ->setCurrency('NZD')
            ->h5()
            ->Alipay();
        return response()->json(array(
                'redirectUrl' => $IPayNow->checkout(),
            ));
        // $order = Order::where('order_sn', $sn)->with(['seller', 'items'])->first();
        // $rate = 0.025;
        // $IPayNow = new IPayNow();
        // $IPayNow->setApiId(config('payment.appId')) //Customise or write on cofig
        //     ->setSecretKey(config('payment.secure_key'))
        //     ->setRedirectUrl(config('payment.frontend_notify_url'))
        //     ->setNotifyUrl(config('payment.frontend_notify_url'))
        //     ->setDisplayName("新西兰微点")
        //     ->setOrderDescription($order->seller->name->zh)
        //     ->setOrderNumber($order->order_sn)
        //     ->setProductDetail($order->items->toArray())
        //     ->setOrderAmount($order->order_total * (1 + $rate))
        //     ->setCurrency('NZD')
        //     ->h5()
        //     ->Alipay();
        // return response()->json(array(
        //     'redirectUrl' => $IPayNow->checkout(),
        // ));
    }

}

