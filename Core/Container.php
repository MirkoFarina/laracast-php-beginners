<?php

namespace Core;

class Container
{
    protected $bindings = [];
    public function bind($key, $function)
    {
        $this->bindings[$key] = $function;
    }

    public function resolve($key)
    {
        if (array_key_exists($key, $this->bindings)) {
            $resolver = $this->bindings[$key];
            return call_user_func($resolver);
        }

        throw new \Exception("No matching binding found for {$key}");
    }
}
