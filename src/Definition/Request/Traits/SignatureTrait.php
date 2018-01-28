<?php

namespace DVE\CEXApiClient\Definition\Request\Traits;

use DVE\CEXApiClient\Definition\Request\PrivateRequestAbstract;
use DVE\CEXApiClient\Definition\Request\RequestInterface;

trait SignatureTrait
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $signature;

    /**
     * @var string
     */
    private $nonce;

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return PrivateRequestAbstract
     */
    public function setKey(string $key): PrivateRequestAbstract
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     * @return PrivateRequestAbstract
     */
    public function setSignature(string $signature): PrivateRequestAbstract
    {
        $this->signature = $signature;
        return $this;
    }

    /**
     * @return string
     */
    public function getNonce(): string
    {
        return $this->nonce;
    }

    /**
     * @param string $nonce
     * @return PrivateRequestAbstract
     */
    public function setNonce(string $nonce): PrivateRequestAbstract
    {
        $this->nonce = $nonce;
        return $this;
    }
}