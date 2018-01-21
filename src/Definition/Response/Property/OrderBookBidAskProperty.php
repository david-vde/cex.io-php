<?php

namespace DVE\CEXApiClient\Definition\Response\Property;

class OrderBookBidAskProperty
{
    /**
     * @var float
     */
    private $rate;

    /**
     * @var float
     */
    private $amount;

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     * @return OrderBookBidAskProperty
     */
    public function setRate(float $rate): OrderBookBidAskProperty
    {
        $this->rate = $rate;
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
     * @return OrderBookBidAskProperty
     */
    public function setAmount(float $amount): OrderBookBidAskProperty
    {
        $this->amount = $amount;
        return $this;
    }

}