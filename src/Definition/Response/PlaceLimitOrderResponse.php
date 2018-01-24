<?php

namespace DVE\CEXApiClient\Definition\Response;

class PlaceLimitOrderResponse extends PlaceOrderResponse
{
    /**
     * @var float
     */
    private $pending;

    /**
     * @var bool
     */
    private $complete;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var float
     */
    private $price;

    /**
     * @return float
     */
    public function getPending(): float
    {
        return $this->pending;
    }

    /**
     * @param float $pending
     * @return PlaceLimitOrderResponse
     */
    public function setPending(float $pending): PlaceLimitOrderResponse
    {
        $this->pending = $pending;
        return $this;
    }

    /**
     * @return bool
     */
    public function isComplete(): bool
    {
        return $this->complete;
    }

    /**
     * @param bool $complete
     * @return PlaceLimitOrderResponse
     */
    public function setComplete(bool $complete): PlaceLimitOrderResponse
    {
        $this->complete = $complete;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return PlaceLimitOrderResponse
     */
    public function setAmount(float $amount): PlaceLimitOrderResponse
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return PlaceLimitOrderResponse
     */
    public function setPrice(float $price): PlaceLimitOrderResponse
    {
        $this->price = $price;
        return $this;
    }
}