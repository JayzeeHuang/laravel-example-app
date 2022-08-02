<?php

use App\Device;
use Illuminate\Http\Request;
use App\Http\FCM\FCM;

class FCMController extends Controller
{
    public function notifyVendor($tittle, string $order, $deviceId)
    {
        $device = Device::where("uuid", $deviceId)->first();
        $fcm = new FCM;
        $fcm->addReceiver($device->notification_token)
            ->setTitle($tittle);
        // ->setBody('New Order');
        $response = $fcm->send();
        return $response;
    }

    public function notifyManager($message)
    {
        $device1 = Device::where("uuid", "e6b7cd52add17c0f")->first();
        $device2 = Device::where("uuid", "80b3e8fcaffad0d2")->first();
        $fcm = new FCM;
        $fcm->addReceiver($device1->notification_token)
            ->addReceiver($device2->notification_token)
            ->setTitle('New Order')
            ->setBody($message);
        $response = $fcm->send();
        return $response;
    }

    public function notifyUser(object $devices, string $tittle, string $body)
    {
        // return $devices;
        $fcm = new FCM;
        for ($i = 0; $i < count($devices); $i++) {
            $fcm->addReceiver($devices[$i]->notification_token);
        }
        $fcm->setTitle($tittle);
        $fcm->setBody($body);
        $response = $fcm->send();
        return $response;
    }

    public function notifyDriver()
    {
    }
}