<?php

namespace DVE\CEXApiClient\Definition\Request;

class PlaceLimitOrderRequest extends PlaceOrderRequest
{
    /**
     * @var float
     */
    private $price;

    /**
     * @return string
     */
    public function getUri(): string
    {
        return '/place_order/'.$this->getSymbol1().'/'.$this->getSymbol2();
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
            'type'      =>  $this->getType(),
            'amount'    =>  $this->getAmount(),
            'price'     =>  $this->price
       ];
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
     * @return PlaceLimitOrderRequest
     */
    public function setPrice(float $price): PlaceLimitOrderRequest
    {
        $this->price = $price;
        return $this;
    }


}