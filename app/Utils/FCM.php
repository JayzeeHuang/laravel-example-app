<?php

namespace App\Utils;

/**
 * @author Jayzee Huang
 * @version 0.1
 */
class FCM
{
    protected $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
    protected $headers = [
        'Authorization: key=',
        'Content-Type: application/json'
    ];
    protected $notification = [
        'title' => null,
        'body' => null,
    ];
    protected $message = [
        'registration_ids' => [],
        'notification' => [],
        'data' => [
            'order' => '',
        ]
    ];

    public function setKey(string $prams)
    {
        $this->headers[0] .= $prams;
        return $this;
    }

    public function setReceiver(string $token)
    {
        $this->message['to'] = $token;
        return $this;
    }

    public function addReceiver(string $token)
    {
        array_push($this->message['registration_ids'], $token);
        return $this;
    }

    public function setTitle(string $string)
    {
        $this->notification['title'] = $string;
        return $this;
    }

    public function setBody(string $string)
    {
        $this->notification['body'] = $string;
        return $this;
    }
    
    public function setCustom(string $key, string $value)
    {
        $this->message['data'][$key] = $value;
        return $this;
    }

    public function build()
    {
        $this->setKey('AAAAN6CPHMo:APA91bGy0X9LRjff5sCWbEpez2VFn3a7_ndtqkryZGHx11f3n5AB_rye_BABQibcABDBMDtgjvIOyeEQRwBvh5P3WJ4giBctTjRn3ep1NBb6IhKFCRk4GRWQiID5AC0v6pfLpZXjaLPa');
        $this->message['notification'] = $this->notification;
    }

    public function testIOS()
    {
        return $this->message = [
            'notification' => array(
                "title" => "Church App",
                "body" => " - ",
                "sound" => "default",
                "icon" => "fcm_push_icon",
                "content_available" => 1,
                'apnsPushType' => 'alert'
            ),
            "apns" => array(
                'headers' => array(
                    'apns-push-type' => 'alert',
                    "apns-priority" => 5,
                    "apns-topic" => "com.churchadminplugin.wpchurch"
                ),
                "payload" => array(
                    "alert" => array("title" => "Church App", "body" => " - "),
                    "aps" => array("content-available" => 1),
                    "sound" => "default", "content-available" => 1
                ),

            ),
            "data" => array(
                "notification_foreground" => FALSE,
                "notification_body" => " - ",
                "notification_title" => "Church App",
                "notification_android_priority" => 1,
                "notification_ios_sound" => "default",
                "sound" => "default",
                "title" => "Church App",
                "body" => " - ",
                "type" => "message",
                "senderName" => 'sdfisdhf',
                "timestamp" => 'sdfsdfsd'
            ),
            "priority" => "high"
        ];
    }

    public function send()
    {
        $this->build();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->message));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}