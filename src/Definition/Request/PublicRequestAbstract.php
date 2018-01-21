<?php

namespace DVE\CEXApiClient\Definition\Request;

use DVE\CEXApiClient\Definition\Request\Traits\SignatureTrait;

abstract class PublicRequestAbstract implements RequestInterface
{
    use SignatureTrait;

    public function toArray(): array
    {
        return [];
    }

    public function isPrivate(): bool
    {
        return false;
    }
}