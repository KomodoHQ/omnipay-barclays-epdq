<?php

namespace Omnipay\BarclaysEpdq;

class TransactionStatus {

    const STATUSES = [
        0   => 'invalid_or_incomplete',
        1   => 'cancelled',
        2   => 'authorisation_refused',
        4   => 'order_stored',
        40  => 'stored_waiting_external_result',
        41  => 'waiting_for_client_payment',
        46  => 'waiting_for_authentication',
        5   => 'authorised',
        50  => 'authorised_waiting_external_result',
        51  => 'authorisation_waiting',
        52  => 'authorisation_not_known',
        55  => 'standby',
        56  => 'ok_with_scheduled_payments',
        57  => 'not_ok_with_scheduled_payments',
        59  => 'authorisation_to_be_requested_manually',
        6   => 'authorised_and_cancelled',
        61  => 'authorised_deletion_waiting',
        62  => 'authorised_deletion_uncertain',
        63  => 'authorised_deletion_refused',
        7   => 'payment_deleted',
        71  => 'payment_deletion_pending',
        72  => 'payment_deletion_uncertain',
        73  => 'payment_deletion_refused',
        8   => 'refund',
        81  => 'refund_pending',
        82  => 'refund_uncertain',
        83  => 'refund_refused',
        85  => 'refund_handled_by_merchant',
        9   => 'payment_requested',
        91  => 'payment_processing',
        92  => 'payment_uncertain',
        93  => 'payment_refused',
        94  => 'payment_declined_by_acquirer',
        95  => 'payment_handled_by_merchant',
        96  => 'payment_refund_reversed',
        99  => 'payment_being_processed',
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