<?php

namespace DVE\CEXApiClient;

class NonceNumberGenerator
{
    /**
     * @return string
     */
    public function generate(): string
    {
        $microtime = explode(' ', microtime());
        return $microtime[1] . substr((1 + $microtime[0]) * 10000000, 0, 8);
    }
}