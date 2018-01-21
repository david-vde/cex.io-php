<?php

namespace DVE\CEXApiClient\Definition\Response\Property;

class BalanceCurrencyProperty
{
    /**
     * @var float
     */
    private $available;

    /**
     * @var float
     */
    private $orders;

    /**
     * @return float
     */
    public function getAvailable(): float
    {
        return $this->available;
    }

    /**
     * @param float $available
     * @return BalanceCurrencyProperty
     */
    public function setAvailable(float $available): BalanceCurrencyProperty
    {
        $this->available = $available;
        return $this;
    }

    /**
     * @return float
     */
    public function getOrders(): float
    {
        return $this->orders;
    }

    /**
     * @param float $orders
     * @return BalanceCurrencyProperty
     */
    public function setOrders(float $orders): BalanceCurrencyProperty
    {
        $this->orders = $orders;
        return $this;
    }

}