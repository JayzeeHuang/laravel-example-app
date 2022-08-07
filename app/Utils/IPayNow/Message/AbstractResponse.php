<?php

namespace App\Utils\IPayNow\Message;

use Psr\Http\Message\ResponseInterface;

abstract class AbstractResponse implements ResponseInterface
{
    public function success(array $response)
    {
        return $response['tradeStatus'] == "A001" || $response['responseCode'] == 'A001';
    }
}