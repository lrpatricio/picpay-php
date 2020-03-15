<?php

namespace PicPay;

use Exception;

class PayloadException extends Exception
{
    /**
     * @param string $field
     * @return PayloadException
     */
    public static function requiredField($field)
    {
        return new self("The field {$field} is required.");
    }
}