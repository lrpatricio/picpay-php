<?php

namespace PicPay\Helpers;

class PayloadHelper
{
    /**
     * Get value on matrix by index separated by dot (.)
     *
     * @param $payload
     * @param $key
     * @param mixed|null $default
     * @return mixed|null
     */
    public static function get($payload, $key, $default = null)
    {
        if(!is_array($payload))
        {
            return $default;
        }

        if(is_null($key))
        {
            return $payload;
        }

        if(array_key_exists($key, $payload))
        {
            return $payload[$key];
        }

        if(strpos($key, '.') === false)
        {
            return $payload[$key] ?: $default;
        }

        foreach(explode('.', $key) as $level)
        {
            if(is_array($payload) && array_key_exists($level, $payload))
            {
                $payload = $payload[$level];
            }
            else
            {
                return $default;
            }
        }

        return $payload;
    }
}