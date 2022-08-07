<?php

namespace App\Utils\IPayNow\Message;

class Helper
{
    public static function joinString(array $array)
    {
        ksort($array);
        reset($array);
        $joinString = '';
        foreach ($array as $key => $value) {
            if ($value === '' || $key === 'funcode' || $key === 'mhtSignType' || $key === 'deviceType' || $key === 'detail' || $key === 'version' || $key === 'signature' || $key === 'signType') {
                continue;
            }
            $joinString .= $key . '=' . $value . '&';
        }
        $joinString = substr($joinString, 0, strlen($joinString) - 1);
        return $joinString;
    }

    /**
     * @param  Array  $array [description]
     * @return String        [description]
     */
    public static function joinRequest(array $array)
    {
        $requestString = '';
        foreach ($array as $key => $value) {
            if ($value === '' || $key === 'detail' || $key === 'version') {
                continue;
            }
            $value = urlencode($value);
            $requestString .= $key . '=' . $value . '&';
        }
        $requestString = substr($requestString, 0, strlen($requestString) - 1);
        return $requestString;
    }

    public static function verify(array $response, $key)
    {
        ksort($response);
        $verifySignature = '';
        foreach ($response as $key => $value) {
            if ($value == '' || $key == 'signature' || $key == 'signType') {
                continue;
            }
            $verifySignature .= $key . '=' . $value . '&';
        }
        $verifySignature .= md5($key);
        return $response['signature'] === md5($verifySignature);
    }

    public static function sign($data, $key)
    {
        $data['mhtSignature'] = md5(self::joinString($data) . '&' . md5($key));
        return $data;
    }
  
}
