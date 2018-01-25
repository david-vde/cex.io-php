<?php

namespace DVE\CEXApiClient\Definition\Request;

class LastPriceRequest extends PublicRequestAbstract
{
    /**
     * @var string
     */
    private $symbol1;

    /**
     * @var string
     */
    private $symbol2;

    /**
     * @return string
     */
    public function getUri(): string
    {
        return '/last_price/'.$this->symbol1.'/'.$this->symbol2;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GET';
    }

    /**
     * @return string
     */
    public function getSymbol1(): string
    {
        return $this->symbol1;
    }

    /**
     * @param string $symbol1
     * @return LastPriceRequest
     */
    public function setSymbol1(string $symbol1): LastPriceRequest
    {
        $this->symbol1 = $symbol1;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol2(): string
    {
        return $this->symbol2;
    }

    /**
     * @param string $symbol2
     * @return LastPriceRequest
     */
    public function setSymbol2(string $symbol2): LastPriceRequest
    {
        $this->symbol2 = $symbol2;
        return $this;
    }
}