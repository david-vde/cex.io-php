<?php

namespace DVE\CEXApiClient\Definition\Request;

use DVE\CEXApiClient\Definition\Request\Traits\SignatureTrait;

abstract class PrivateRequestAbstract implements RequestInterface
{
    use SignatureTrait;

    /**
     * @return array
     */
    public function getBodyParams(): array
    {
        return [
            'key'       =>  $this->getKey(),
            'signature' =>  $this->getSignature(),
            'nonce'     =>  $this->getNonce()
        ];
    }

    /**
     * @return array
     */
    public function getQueryParams(): array
    {
        return [];
    }

    /**
     * @return bool
     */
    public function isPrivate(): bool
    {
        return true;
    }
}