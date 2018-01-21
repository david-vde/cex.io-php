<?php

namespace DVE\CEXApiClient\Definition\Request;

use DVE\CEXApiClient\Definition\Request\Traits\SignatureTrait;

abstract class PrivateRequestAbstract implements RequestInterface
{
    use SignatureTrait;

    public function toArray(): array
    {
        return [
            'key'       =>  $this->getKey(),
            'signature' =>  $this->getSignature(),
            'nonce'     =>  $this->getNonce()
        ];
    }

    public function isPrivate(): bool
    {
        return true;
    }
}