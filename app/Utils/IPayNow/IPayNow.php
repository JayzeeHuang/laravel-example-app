<?php

namespace App\Utils\IPayNow;

/**
 * @author Jayzee Huang
 * @version 0.5
 */
class IPayNow 
{
    protected $endPoint = 'https://gapi.ipaynow.cn/global';
    protected $secretKey = 'yhmpArx0Pn7DqqFpuYErDoikNVRud78t';
    protected $request = [
        "appId" => "1461826666666666",
        "channelAuthCode" => "",
        "deviceType" => "",
        "frontNotifyUrl" => "",
        "funcode" => "",
        "mhtAmtCurrFlag" => "",
        "mhtCharset" => "UTF-8",
        "mhtCurrencyType" => "",
        "mhtOrderAmt" => "",
        "mhtOrderDetail" => "",
        "mhtOrderName" => "",
        "mhtOrderNo" => "",
        "mhtOrderStartTime" => "",
        "mhtOrderTimeOut" => "",
        "mhtOrderType" => "",
        "mhtSignType" => "MD5",
        "notifyUrl" => "",
        "payChannelType" => "",
        "detail" => array("goods_detail" => []),
        "version" => "1",
        "mhtSignature" => "",
    ];


    public function setApiId(String $value)
    {
        $this->request['appId'] = $value;
    }

    /**
     * @param String|string $value [description]
     */
    public function setSecretKey(String $value)
    {
        $this->secretKey = $value;
        return $this;
    }

    /**
     * @param String|string $value [description]
     */
    public function setRedirectUrl(String $value)
    {
        $this->request['frontNotifyUrl'] = $value;
        return $this;
    }


    /**
     * @param String|string $value [description]
     */
    public function setNotifyUrl(String $value)
    {
        $this->request['notifyUrl'] = $value;
        return $this;
    }


    /**
     * @param String|string $value [description]
     */
    public function setDisplayName(String $value)
    {
        $this->request['mhtOrderName'] = $value;
        return $this;
    }


    /**
     * @param String|string $value [description]
     */
    public function setOrderDescription(String $value)
    {
        $this->request['mhtOrderDetail'] = $value;
        return $this;
    }

    /**
     * @param String|string $value [description]
     */
    public function setOrderNumber(String $value)
    {
        $this->request['mhtOrderNo'] = $value;
        return $this;
    }

    /**
     * @param [type] $value [description]
     */
    public function setOrderAmount($value)
    {
        $this->request['mhtOrderAmt'] = ceil($value * 100);
        return $this;
    }

    public function setCurrency(String $value)
    {
        $this->request['mhtAmtCurrFlag'] = "1";
        $this->request['mhtCurrencyType'] = $value;
        return $this;
    }

    public function sdk()
    {
        $this->request['deviceType'] = '01';
    }

    public function pc()
    {
        $this->request['deviceType'] = '02';
    }

    public function scan($code)
    {
        $this->request['deviceType'] = '05';
        $this->request['channelAuthCode'] = $code;
    }

    public function h5()
    {
        $this->request['deviceType'] = '06';
    }

    /**
     * [Alipay description]
     */
    public function Alipay()
    {
        return $this->request['payChannelType'] = 90;
    }

    /**
     * [WeChatPay description]
     */
    public function WeChatPay()
    {
        $this->request['mhtSubAppId'] = 'wxc9e3984d74d0df9a';
        return $this->request['payChannelType'] = 80;
    }

    /**
     * @return [type] [description]
     */
    public function sign()
    {
        return $this->request['mhtSignature'] = md5($this->joinString($this->request) . '&' . md5($this->secretKey));
    }

    /**
     * @param  Array  $array [description]
     * @return String        [description]
     */
    public function joinString(array $array)
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
     * @param Array $array [description]
     */
    public function setProductDetail(array $array)
    {
        foreach ($array as $item) {
            array_push($this->request['detail']['goods_detail'], ['good_name' => $item['name'], "quantity" => $item['quantity']]);
        }
    }

    /**
     * @param  Array  $array [description]
     * @return String        [description]
     */
    public function joinRequest(array $array)
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

    /**
     * @return String [description]
     */
    public function checkout()
    {
        $this->request['funcode'] = 'WP001';
        $timeZone = date_default_timezone_set("Asia/Shanghai");
        $this->request['mhtOrderStartTime'] = date("YmdHis");
        $this->request['mhtOrderTimeOut'] = "3600";
        $this->request['mhtOrderType'] = "01";
        $this->sign();
        $requestUrl = $this->endPoint . '?' . $this->joinRequest($this->request);
        return $requestUrl;
    }

    public function verify(array $response)
    {
        ksort($response);
        $verifySignature = '';
        foreach ($response as $key => $value) {
            if ($value == '' || $key == 'signature' || $key == 'signType') {
                continue;
            }
            $verifySignature .= $key . '=' . $value . '&';
        }
        $verifySignature .= md5($this->secretKey);
        return $response['signature'] === md5($verifySignature);
    }

    public function requestString()
    {
        return $this->joinRequest($this->request);
    }

    public function debug()
    {
        echo json_encode($this->request);
    }

    public function check(string $sn)
    {
        $this->request['funcode'] = 'MQ001';
        $this->request['mhtOrderNo'] = $sn;
        $this->sign();
        $requestUrl = $this->endPoint . '?' . $this->joinRequest($this->request);
        return $requestUrl;
    }

    public function success(array $response)
    {
        return $response['tradeStatus'] == "A001" || $response['responseCode'] == 'A001';
    }
}
