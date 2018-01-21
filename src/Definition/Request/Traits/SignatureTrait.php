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
     * @var int
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
     * @return int
     */
    public function getNonce(): int
    {
        return $this->nonce;
    }

    /**
     * @param int $nonce
     * @return PrivateRequestAbstract
     */
    public function setNonce(int $nonce): PrivateRequestAbstract
    {
        $this->nonce = $nonce;
        return $this;
    }
}