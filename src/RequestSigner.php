<?php

namespace DVE\CEXApiClient;

class RequestSigner
{
    /**
     * @param string $userID
     * @param string $apiKey
     * @param string $apiSecret
     * @param string $nonce
     * @return string
     */
    public function generate(string $userID, string $apiKey, string $apiSecret, string $nonce): string
    {
        return strtoupper(hash_hmac('sha256', $nonce.$userID.$apiKey, $apiSecret));
    }
}