<?php

namespace App\Utils\IPayNow;

use App\Utils\Common\ParametersTrait;

abstract class AbstractGateway implements GatewayInterface
{

    use ParametersTrait;

    private $parameters;

    public function setApiId(String $value)
    {
        $this->parameters->set('appId', $value);
    }

    public function setSecretKey(String $value)
    {
        $this->parameters->set('secretKey', $value);
    }

    // public function createRequest(array $parameters = array())
    // {
    //     return $this->createRequest('\App\Utils\IPayNow\Message', $parameters);
    // }
    public function getAll(){
        return $this->parameters->all();
    }

}
