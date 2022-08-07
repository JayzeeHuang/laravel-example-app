<?php

namespace App\Utils\Common;

trait ParametersTrait
{
    public function get(string $key, mixed $default = null): mixed
    {
        return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
    }

    function set(string $key, mixed $value)
    {
        $this->parameters[$key] = $value;
    }

    public function add(array $parameters = [])
    {
        $this->parameters = array_replace($this->parameters, $parameters);
    }

    public function all(): array
    {
        return $this->parameters;
    }
    
}
