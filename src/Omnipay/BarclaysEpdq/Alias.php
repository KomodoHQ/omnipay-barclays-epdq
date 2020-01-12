<?php

namespace Omnipay\BarclaysEpdq;

use Symfony\Component\HttpFoundation\ParameterBag;
use Omnipay\Common\Helper;

/**
 * BarclaysEpdq Alias data
 */
class Alias
{
    /**
     * @var \Symfony\Component\HttpFoundation\ParameterBag
     */
    protected $parameters;

    /**
     * Create a new BankAccount object using the specified parameters
     *
     * @param array $parameters An array of parameters to set on the new object
     */
    public function __construct($parameters = null)
    {
        $this->initialize($parameters);
    }

    /**
     * Initialize the object with parameters.
     *
     * If any unknown parameters passed, they will be ignored.
     *
     * @param array $parameters An associative array of parameters
     *
     * @return $this
     */
    public function initialize($parameters = null)
    {
        $this->parameters = new ParameterBag();
        Helper::initialize($this, $parameters);
        return $this;
    }

    public function getParameters()
    {
        return $this->parameters->all();
    }

    protected function getParameter($key)
    {
        return $this->parameters->get($key);
    }

    protected function setParameter($key, $value)
    {
        $this->parameters->set($key, $value);
        return $this;
    }

    /**
     * Alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->getParameter('alias');
    }

    /**
     * @param string $value
     */
    public function setAlias($value)
    {
        $this->setParameter('alias', $value);
    }

    /**
     * Alias persisted after use
     *
     * @return string
     */
    public function getAliasPersistedAfterUse()
    {
        return $this->getParameter('aliasPersistedAfterUse');
    }

    /**
     * @param string $value
     */
    public function setAliasPersistedAfterUse($value)
    {
        $this->setParameter('aliasPersistedAfterUse', $value);
    }

    /**
     * Alias ID
     *
     * @return string
     */
    public function getAliasId()
    {
        return $this->getParameter('aliasId');
    }

    /**
     * @param string $value
     */
    public function setAliasId($value)
    {
        $this->setParameter('aliasId', $value);
    }

    /**
     * Alias operation
     *
     * @return string
     */
    public function getAliasOperation()
    {
        return $this->getParameter('aliasOperation');
    }

    /**
     * @param string $value
     */
    public function setAliasOperation($value)
    {
        $this->setParameter('aliasOperation', $value);
    }

    /**
     * Alias usage
     *
     * @return string
     */
    public function getAliasUsage()
    {
        return $this->getParameter('aliasUsage');
    }

    /**
     * @param string $value
     */
    public function setAliasUsage($value)
    {
        $this->setParameter('aliasUsage', $value);
    }
}
