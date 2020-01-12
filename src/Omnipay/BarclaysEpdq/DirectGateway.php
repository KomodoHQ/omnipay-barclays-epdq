<?php

namespace Omnipay\BarclaysEpdq;

use Omnipay\Common\AbstractGateway;

/**
 * BarclaysEpdq Essential Gateway
 *
 * @link http://www.barclaycard.co.uk/business/epdq-cpi/technical-info
 */
class DirectGateway extends AbstractGateway
{

    public function getName()
    {
        return 'BarclaysDirectEpdq';
    }

    public function getDefaultParameters()
    {
        return array(
            'clientId' => '',
            'testMode' => false,
            'language' => 'en_US',
            'callbackMethod' => 'POST'
        );
    }

    /**
     * @param array $parameters
     * @return \Omnipay\BarclaysEpdq\Message\EssentialPurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest(
            '\Omnipay\BarclaysEpdq\Message\DirectPurchaseRequest',
            array_merge($this->parameters->all(), $parameters)
        );
    }

    /**
     * @param array $parameters
     * @return \Omnipay\BarclaysEpdq\Message\EssentialCompletePurchaseRequest
     */
    public function completePurchase(array $parameters = array())
    {
        return $this->createRequest(
            '\Omnipay\BarclaysEpdq\Message\DirectCompletePurchaseRequest',
            array_merge($this->parameters->all(), $parameters)
        );
    }

    public function getClientId()
    {
        return $this->getParameter('clientId');
    }

    public function setClientId($value)
    {
        return $this->setParameter('clientId', $value);
    }

    public function getCallbackMethod()
    {
        return $this->getParameter('callbackMethod');
    }

    public function setCallbackMethod($value)
    {
        return $this->setParameter('callbackMethod', $value);
    }

    public function getShaAlgorithm()
    {
        return $this->getParameter('shaAlgorithm');
    }

    public function setShaAlgorithm($value)
    {
        return $this->setParameter('shaAlgorithm', $value);
    }

    public function getShaIn()
    {
        return $this->getParameter('shaIn');
    }

    public function setShaIn($value)
    {
        return $this->setParameter('shaIn', $value);
    }

    public function getShaOut()
    {
        return $this->getParameter('shaOut');
    }

    public function setShaOut($value)
    {
        return $this->setParameter('shaOut', $value);
    }

    public function getReturnUrl()
    {
        return $this->getParameter('returnUrl');
    }

    public function getDeclineUrl()
    {
        return $this->getParameter('declineUrl');
    }

    public function getExceptionUrl()
    {
        return $this->getParameter('exceptionUrl');
    }

    public function setReturnUrl($value)
    {
        $this->setParameter('returnUrl', $value);
        $this->setParameter('declineUrl', $value);
        $this->setParameter('exceptionUrl', $value);

        return $this;
    }

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function setLanguage($value)
    {
        return $this->setParameter('language', $value);
    }

    public function getEci()
    {
        return $this->getParameter('eci');
    }

    public function setEci($value)
    {
        return $this->setParameter('eci', $value);
    }

    public function getApiUserPassword()
    {
        return $this->getParameter('apiUserPassword');
    }

    public function setApiUserPassword($value)
    {
        return $this->setParameter('apiUserPassword', $value);
    }

    public function getApiUserId()
    {
        return $this->getParameter('apiUserId');
    }

    public function setApiUserId($value)
    {
        return $this->setParameter('apiUserId', $value);
    }
}
