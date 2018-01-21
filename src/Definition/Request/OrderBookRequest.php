<?php

namespace DVE\CEXApiClient\Definition\Request;

class OrderBookRequest extends PublicRequestAbstract
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
     * @var integer
     */
    private $depth;

    /**
     * @return string
     */
    public function getUri(): string
    {
        return '/order_book/'.$this->symbol1.'/'.$this->symbol2;
    }

    /**
     * @return array
     */
    public function getQueryParams(): array
    {
        $params = [];

        if($this->depth) {
            $params['depth'] = $this->depth;
        }

        return $params;
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
     * @return OrderBookRequest
     */
    public function setSymbol1(string $symbol1): OrderBookRequest
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
     * @return OrderBookRequest
     */
    public function setSymbol2(string $symbol2): OrderBookRequest
    {
        $this->symbol2 = $symbol2;
        return $this;
    }

    /**
     * @return int
     */
    public function getDepth(): int
    {
        return $this->depth;
    }

    /**
     * @param int $depth
     * @return OrderBookRequest
     */
    public function setDepth(?int $depth): OrderBookRequest
    {
        $this->depth = $depth;
        return $this;
    }


}