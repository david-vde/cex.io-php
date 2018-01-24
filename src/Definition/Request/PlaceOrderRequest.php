<?php

namespace DVE\CEXApiClient\Definition\Request;

abstract class PlaceOrderRequest extends PrivateRequestAbstract
{
    /**
     * @var string
     */
    protected $symbol1;

    /**
     * @var string
     */
    protected $symbol2;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var float
     */
    protected $amount;

    /**
     * @return string
     */
    public function getUri(): string
    {
        return '/place_order/'.$this->symbol1.'/'.$this->symbol2;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'POST';
    }

    /**
     * @return array
     */
    public function getBodyParams(): array
    {
       return parent::getBodyParams() + [
            'type'      =>  $this->type,
            'amount'    =>  $this->amount
       ];
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
     * @return PlaceOrderRequest
     */
    public function setSymbol1(string $symbol1): PlaceOrderRequest
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
     * @return PlaceOrderRequest
     */
    public function setSymbol2(string $symbol2): PlaceOrderRequest
    {
        $this->symbol2 = $symbol2;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return PlaceOrderRequest
     */
    public function setType(string $type): PlaceOrderRequest
    {
        $this->type = $type;
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
     * @return PlaceOrderRequest
     */
    public function setAmount(float $amount): PlaceOrderRequest
    {
        $this->amount = $amount;
        return $this;
    }
}