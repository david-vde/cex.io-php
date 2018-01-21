<?php

namespace DVE\CEXApiClient\Definition\Response;

use DVE\CEXApiClient\Definition\Response\Property\OrderBookBidAskProperty;

class OrderBookResponse implements ResponseInterface
{
    /**
     * @var int
     */
    private $timestamp;

    /**
     * @var int
     */
    private $id;

    /**
     * @var OrderBookBidAskProperty[]
     */
    private $bids;

    /**
     * @var OrderBookBidAskProperty[]
     */
    private $asks;

    /**
     * @var string
     */
    private $pair;

    /**
     * @var float
     */
    private $sellTotal;

    /**
     * @var float
     */
    private $buyTotal;

    /**
     * @return float
     */
    public function getSpread()
    {
        $bid = $this->getBids()[0];
        $ask = $this->getAsks()[0];

        return (float)($ask->getRate() - $bid->getRate());
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     * @return OrderBookResponse
     */
    public function setTimestamp(int $timestamp): OrderBookResponse
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return OrderBookResponse
     */
    public function setId(int $id): OrderBookResponse
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return OrderBookBidAskProperty[]
     */
    public function getBids(): array
    {
        return $this->bids;
    }

    /**
     * @param OrderBookBidAskProperty[] $bids
     * @return OrderBookResponse
     */
    public function setBids(array $bids): OrderBookResponse
    {
        $this->bids = $bids;
        return $this;
    }

    /**
     * @return OrderBookBidAskProperty[]
     */
    public function getAsks(): array
    {
        return $this->asks;
    }

    /**
     * @param OrderBookBidAskProperty[] $asks
     * @return OrderBookResponse
     */
    public function setAsks(array $asks): OrderBookResponse
    {
        $this->asks = $asks;
        return $this;
    }

    /**
     * @return string
     */
    public function getPair(): string
    {
        return $this->pair;
    }

    /**
     * @param string $pair
     * @return OrderBookResponse
     */
    public function setPair(string $pair): OrderBookResponse
    {
        $this->pair = $pair;
        return $this;
    }

    /**
     * @return float
     */
    public function getSellTotal(): float
    {
        return $this->sellTotal;
    }

    /**
     * @param float $sellTotal
     * @return OrderBookResponse
     */
    public function setSellTotal(float $sellTotal): OrderBookResponse
    {
        $this->sellTotal = $sellTotal;
        return $this;
    }

    /**
     * @return float
     */
    public function getBuyTotal(): float
    {
        return $this->buyTotal;
    }

    /**
     * @param float $buyTotal
     * @return OrderBookResponse
     */
    public function setBuyTotal(float $buyTotal): OrderBookResponse
    {
        $this->buyTotal = $buyTotal;
        return $this;
    }


}