<?php

namespace Omnipay\BarclaysEpdq\Message;

use Omnipay\BarclaysEpdq\CheckoutStatus;
use Omnipay\BarclaysEpdq\TransactionStatus;
use Omnipay\Common\Message\AbstractResponse;

/**
 * BarclaysEpdq Complete Purchase Response
 */
class FlexCheckoutCompletePurchaseResponse extends AbstractResponse
{
    const SUCCESS_STATUSES = [
        'success',
        'alias_updated',
    ];

    public function isSuccessful()
    {
        return $this->getStatusMessage() && in_array($this->getStatusMessage(), self::SUCCESS_STATUSES);
    }

    public function getStatusCode()
    {
        return isset($this->data['Alias_Status']) ? (int)$this->data['Alias_Status'] : null;
    }

    public function getStatusMessage()
    {
        return CheckoutStatus::getStatusMessageByCode($this->getStatusCode());
    }

    public function getCardBrand()
    {
        return isset($this->data['Card_Brand']) ? $this->data['Card_Brand'] : null;
    }

    public function getCardholderName()
    {
        return isset($this->data['Card_CardHolderName']) ? $this->data['Card_CardHolderName'] : null;
    }

    public function getCardNumber()
    {
        return isset($this->data['Card_CardNumber']) ? substr($this->data['Card_CardNumber'], -4) : null;
    }

    public function getStorePermanently()
    {
        return isset($this->data['Alias_StorePermanently']) && $this->data['Alias_StorePermanently'] === 'Y' ? 1 : 0;
    }

    public function getCardExpiry()
    {
        return isset($this->data['Card_ExpiryDate']) ? $this->data['Card_ExpiryDate'] : null;
    }

    public function getAliasId()
    {
        return isset($this->data['Alias_AliasId']) ? $this->data['Alias_AliasId'] : null;
    }

    public function getTransactionReference()
    {
        return isset($this->data['Alias_OrderId']) ? $this->data['Alias_OrderId'] : null;
    }
}
