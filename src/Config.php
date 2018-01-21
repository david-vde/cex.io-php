<?php

namespace DVE\CEXApiClient;

class Config
{
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string
     */
    private $apiSecret;

    /**
     * @var string
     */
    private $apiUserID;

    /**
     * @var string
     */
    private $apiUrl = 'https://cex.io/api';

    /**
     * @return string
     */
    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     * @return Config
     */
    public function setApiKey(string $apiKey): Config
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiSecret(): string
    {
        return $this->apiSecret;
    }

    /**
     * @param string $apiSecret
     * @return Config
     */
    public function setApiSecret(string $apiSecret): Config
    {
        $this->apiSecret = $apiSecret;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiUserID(): string
    {
        return $this->apiUserID;
    }

    /**
     * @param string $apiUserID
     * @return Config
     */
    public function setApiUserID(string $apiUserID): Config
    {
        $this->apiUserID = $apiUserID;
        return $this;
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        return $this->apiUrl;
    }

    /**
     * @param string $apiUrl
     * @return Config
     */
    public function setApiUrl(string $apiUrl): Config
    {
        $this->apiUrl = $apiUrl;
        return $this;
    }
    
}