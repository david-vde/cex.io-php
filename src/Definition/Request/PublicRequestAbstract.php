<?php

namespace DVE\CEXApiClient\Definition\Request;

use DVE\CEXApiClient\Definition\Request\Traits\SignatureTrait;

abstract class PublicRequestAbstract implements RequestInterface
{
    use SignatureTrait;

    /**
     * @return array
     */
    public function getBodyParams(): array
    {
        return [];
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
        return false;
    }
}