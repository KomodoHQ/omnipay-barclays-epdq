<?php

namespace Omnipay\BarclaysEpdq;

class CheckoutStatus {

    const STATUSES = [
        0   => 'success',
        1   => 'failed',
        2   => 'alias_updated',
        3   => 'cancelled_by_user',
    ];

    public static function getStatusMessageByCode($statusCode)
    {
        if (array_key_exists($statusCode, self::STATUSES)) {
            return self::STATUSES[$statusCode];
        }

        return null;
    }

    public static function getStatusCodeByMessage($message)
    {
        if ($code = array_search($message, self::STATUSES)) {
            return $code;
        }

        return null;
    }

}