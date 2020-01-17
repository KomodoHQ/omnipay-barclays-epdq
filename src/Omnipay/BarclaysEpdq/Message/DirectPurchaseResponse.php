<?php

namespace Omnipay\BarclaysEpdq\Message;

use Omnipay\BarclaysEpdq\Helpers\XMLHelper;
use Omnipay\BarclaysEpdq\TransactionStatus;
use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * BarclaysEpdq Purchase Response
 */
class DirectPurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    const SUCCESS_STATUSES = [
        'authorised',
        'payment_requested',
    ];

    protected $requestCode;

    public function __construct(AbstractRequest $request, $data)
    {
        $this->requestCode = $data->getStatusCode();

        $content = $data->getBody()->getContents();

        try {
            $xml = simplexml_load_string((string)$content, 'SimpleXMLElement', LIBXML_NOWARNING);
        } catch (\Exception $e) {
            throw new InvalidResponseException();
        }

        if (!$xml) {
            throw new InvalidResponseException();
        }

        $data = XMLHelper::xmlToArray($xml);

        if (!isset($data['ncresponse']['attributes'])) {
            throw new InvalidResponseException('The response from the gateway does not include the expected attributes');
        }

        parent::__construct($request, $data['ncresponse']['attributes']);
    }

    public function isSuccessful()
    {
        return $this->getStatusMessage() && in_array($this->getStatusMessage(), self::SUCCESS_STATUSES);
    }

    public function getStatusCode()
    {
        return isset($this->data['STATUS']) ? (int)$this->data['STATUS'] : null;
    }

    public function getStatusMessage()
    {
        return TransactionStatus::getStatusMessageByCode($this->getStatusCode());
    }

    public function getCode()
    {
        return $this->requestCode;
    }
}
