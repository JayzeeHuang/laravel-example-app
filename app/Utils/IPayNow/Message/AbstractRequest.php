<?php

namespace App\Utils\IPayNow\Message;

use App\Utils\Common\Parameters;

abstract class AbstractRequest implements RequestInterface 
{

    protected $request;

    protected $endPoint = 'https://gapi.ipaynow.cn/global';

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
        // return $this->set('mhtOrderAmt', ceil($value * 100));
    }

    public function setCurrency(String $value)
    {
        $this->request['mhtAmtCurrFlag'] = "1";
        $this->request['mhtCurrencyType'] = $value;
        return $this;
    }

    /**
     * @param Array $array [description]
     */
    public function setProductDetail(array $array)
    {
        foreach ($array as $item) {
            array_push($this->request['detail']['goods_detail'], ['good_name' => $item['name'], "quantity" => $item['quantity']]);
        }
        return $this;
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
        $this->request = Helper::sign($this->request, $this->secretKey);
        $requestUrl = $this->endPoint . '?' . Helper::joinRequest($this->request);
        return $requestUrl;
    }
}
