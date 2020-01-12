<?php

namespace Omnipay\BarclaysEpdq\Message;

use Omnipay\BarclaysEpdq\Helpers\XMLHelper;
use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * BarclaysEpdq Purchase Response
 */
class DirectPurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    protected $statusCode;

    public function __construct(AbstractRequest $request, $data)
    {
        $this->statusCode = $data->getStatusCode();

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
        if (
            isset($this->data['NCERROR']) && $this->data['NCERROR'] !== '' && $this->data['NCERROR'] === '0' &&
            isset($this->data['PAYID']) && $this->data['PAYID'] !== '' && $this->data['PAYID'] !== '0'
        ) {
            return true;
        }

        return false;
    }

    public function getCode()
    {
        return $this->statusCode;
    }
}
