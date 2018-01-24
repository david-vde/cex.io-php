<?php

namespace DVE\CEXApiClient\Definition\Response;

class PlaceMarketOrderResponse extends PlaceOrderResponse
{
    /**
     * @var float
     */
    private $symbol1amount;

    /**
     * @var float
     */
    private $symbol2amount;

    /**
     * @var string
     */
    private $message;

    /**
     * @return float
     */
    public function getSymbol1amount(): float
    {
        return $this->symbol1amount;
    }

    /**
     * @param float $symbol1amount
     * @return PlaceMarketOrderResponse
     */
    public function setSymbol1amount(float $symbol1amount): PlaceMarketOrderResponse
    {
        $this->symbol1amount = $symbol1amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getSymbol2amount(): float
    {
        return $this->symbol2amount;
    }

    /**
     * @param float $symbol2amount
     * @return PlaceMarketOrderResponse
     */
    public function setSymbol2amount(float $symbol2amount): PlaceMarketOrderResponse
    {
        $this->symbol2amount = $symbol2amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return PlaceMarketOrderResponse
     */
    public function setMessage(string $message): PlaceMarketOrderResponse
    {
        $this->message = $message;
        return $this;
    }
}