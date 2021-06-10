<?php
namespace App;

class Constants {
    const ORDER_STATUS_UNPAID = 1;
    const ORDER_STATUS_ON_PROCESS = 2;
    const ORDER_STATUS_ON_DELIVERY = 3;
    const ORDER_STATUS_FINISHED = 4;
    const ORDER_STATUS_CANCELLED = 5;

    const PAYMENT_STATUS_APPROVED = 1;
    const PAYMENT_STATUS_FAILED = 2;

    const PAYMENT_METHOD_PAYPAL = 1;

    const PAYPAL_PAYMENT_APPROVED = 'approved';
}
