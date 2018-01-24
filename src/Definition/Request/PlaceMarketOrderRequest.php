<?php

namespace DVE\CEXApiClient\Definition\Request;

class PlaceMarketOrderRequest extends PlaceOrderRequest
{
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
            'order_type' => 'market'
       ];
    }

}