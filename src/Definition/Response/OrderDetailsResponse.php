<?php

namespace DVE\CEXApiClient\Definition\Response;

class OrderDetailsResponse implements ResponseInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $orderId;

    /**
     * @var string
     */
    private $type;

    /**
     * @var \DateTime
     */
    private $time;

    /**
     * @var \DateTime
     */
    private $lastTxTime;

    /**
     * @var string
     */
    private $lastTx;

    /**
     * @var string|null
     */
    private $pos;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $symbol1;

    /**
     * @var string
     */
    private $symbol2;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $tradingFeeMaker;

    /**
     * @var float
     */
    private $tradingFeeTaker;

    /**
     * @var string
     */
    private $tradingFeeStrategy;

    /**
     * @var float
     */
    private $tradingFeeUserVolumeAmount;

    /**
     * @var float
     */
    private $remains;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return OrderDetailsResponse
     */
    public function setId(string $id): OrderDetailsResponse
    {
        $this->id = $id;
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
     * @return \DateTime
     */
    public function getTime(): \DateTime
    {
        return $this->time;
    }

    /**
     * @param \DateTime $time
     * @return OrderDetailsResponse
     */
    public function setTime(\DateTime $time): OrderDetailsResponse
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @param string $type
     * @return OrderDetailsResponse
     */
    public function setType(string $type): OrderDetailsResponse
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastTxTime(): \DateTime
    {
        return $this->lastTxTime;
    }

    /**
     * @param \DateTime $lastTxTime
     * @return OrderDetailsResponse
     */
    public function setLastTxTime(\DateTime $lastTxTime): OrderDetailsResponse
    {
        $this->lastTxTime = $lastTxTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastTx(): string
    {
        return $this->lastTx;
    }

    /**
     * @param string $lastTx
     * @return OrderDetailsResponse
     */
    public function setLastTx(string $lastTx): OrderDetailsResponse
    {
        $this->lastTx = $lastTx;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPos(): ?string
    {
        return $this->pos;
    }

    /**
     * @param string|null $pos
     * @return OrderDetailsResponse
     */
    public function setPos(?string $pos): OrderDetailsResponse
    {
        $this->pos = $pos;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return OrderDetailsResponse
     */
    public function setUser(?string $user): OrderDetailsResponse
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return OrderDetailsResponse
     */
    public function setStatus(string $status): OrderDetailsResponse
    {
        $this->status = $status;
        return $this;
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
     * @return OrderDetailsResponse
     */
    public function setSymbol1(string $symbol1): OrderDetailsResponse
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
     * @return OrderDetailsResponse
     */
    public function setSymbol2(string $symbol2): OrderDetailsResponse
    {
        $this->symbol2 = $symbol2;
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
     * @return OrderDetailsResponse
     */
    public function setAmount(float $amount): OrderDetailsResponse
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
     * @return OrderDetailsResponse
     */
    public function setPrice(float $price): OrderDetailsResponse
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float
     */
    public function getTradingFeeMaker(): float
    {
        return $this->tradingFeeMaker;
    }

    /**
     * @param float $tradingFeeMaker
     * @return OrderDetailsResponse
     */
    public function setTradingFeeMaker(float $tradingFeeMaker): OrderDetailsResponse
    {
        $this->tradingFeeMaker = $tradingFeeMaker;
        return $this;
    }

    /**
     * @return float
     */
    public function getTradingFeeTaker(): float
    {
        return $this->tradingFeeTaker;
    }

    /**
     * @param float $tradingFeeTaker
     * @return OrderDetailsResponse
     */
    public function setTradingFeeTaker(float $tradingFeeTaker): OrderDetailsResponse
    {
        $this->tradingFeeTaker = $tradingFeeTaker;
        return $this;
    }

    /**
     * @return string
     */
    public function getTradingFeeStrategy(): string
    {
        return $this->tradingFeeStrategy;
    }

    /**
     * @param string $tradingFeeStrategy
     * @return OrderDetailsResponse
     */
    public function setTradingFeeStrategy(string $tradingFeeStrategy): OrderDetailsResponse
    {
        $this->tradingFeeStrategy = $tradingFeeStrategy;
        return $this;
    }

    /**
     * @return float
     */
    public function getTradingFeeUserVolumeAmount(): float
    {
        return $this->tradingFeeUserVolumeAmount;
    }

    /**
     * @param float $tradingFeeUserVolumeAmount
     * @return OrderDetailsResponse
     */
    public function setTradingFeeUserVolumeAmount(float $tradingFeeUserVolumeAmount): OrderDetailsResponse
    {
        $this->tradingFeeUserVolumeAmount = $tradingFeeUserVolumeAmount;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     * @return OrderDetailsResponse
     */
    public function setOrderId(string $orderId): OrderDetailsResponse
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return float
     */
    public function getRemains(): float
    {
        return $this->remains;
    }

    /**
     * @param float $remains
     * @return OrderDetailsResponse
     */
    public function setRemains(float $remains): OrderDetailsResponse
    {
        $this->remains = $remains;
        return $this;
    }
}