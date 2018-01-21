<?php

namespace DVE\CEXApiClient\Definition\Response;

use DVE\CEXApiClient\Definition\Response\Property\BalanceCurrencyProperty;
use DVE\CEXApiClient\Definition\Response\Traits\TimestampTrait;

class BalanceResponse implements ResponseInterface
{
    /**
     * @var int
     */
    private $timestamp;

    /**
     * @var string
     */
    private $username;

    /**
     * @var BalanceCurrencyProperty
     */
    private $BTC;

    /**
     * @var BalanceCurrencyProperty
     */
    private $BCH;

    /**
     * @var BalanceCurrencyProperty
     */
    private $BTG;

    /**
     * @var BalanceCurrencyProperty
     */
    private $ETH;

    /**
     * @var BalanceCurrencyProperty
     */
    private $DASH;

    /**
     * @var BalanceCurrencyProperty
     */
    private $ZEC;

    /**
     * @var BalanceCurrencyProperty
     */
    private $USD;

    /**
     * @var BalanceCurrencyProperty
     */
    private $EUR;

    /**
     * @var BalanceCurrencyProperty
     */
    private $GBP;

    /**
     * @var BalanceCurrencyProperty
     */
    private $RUB;

    /**
     * @var BalanceCurrencyProperty
     */
    private $GHS;

    /**
     * @var BalanceCurrencyProperty
     */
    private $XRP;

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     * @return BalanceResponse
     */
    public function setTimestamp(int $timestamp): BalanceResponse
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return BalanceResponse
     */
    public function setUsername(string $username): BalanceResponse
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return BalanceCurrencyProperty
     */
    public function getBTC(): BalanceCurrencyProperty
    {
        return $this->BTC;
    }

    /**
     * @param BalanceCurrencyProperty $BTC
     * @return BalanceResponse
     */
    public function setBTC(BalanceCurrencyProperty $BTC): BalanceResponse
    {
        $this->BTC = $BTC;
        return $this;
    }

    /**
     * @return BalanceCurrencyProperty
     */
    public function getBCH(): BalanceCurrencyProperty
    {
        return $this->BCH;
    }

    /**
     * @param BalanceCurrencyProperty $BCH
     * @return BalanceResponse
     */
    public function setBCH(BalanceCurrencyProperty $BCH): BalanceResponse
    {
        $this->BCH = $BCH;
        return $this;
    }

    /**
     * @return BalanceCurrencyProperty
     */
    public function getBTG(): BalanceCurrencyProperty
    {
        return $this->BTG;
    }

    /**
     * @param BalanceCurrencyProperty $BTG
     * @return BalanceResponse
     */
    public function setBTG(BalanceCurrencyProperty $BTG): BalanceResponse
    {
        $this->BTG = $BTG;
        return $this;
    }

    /**
     * @return BalanceCurrencyProperty
     */
    public function getETH(): BalanceCurrencyProperty
    {
        return $this->ETH;
    }

    /**
     * @param BalanceCurrencyProperty $ETH
     * @return BalanceResponse
     */
    public function setETH(BalanceCurrencyProperty $ETH): BalanceResponse
    {
        $this->ETH = $ETH;
        return $this;
    }

    /**
     * @return BalanceCurrencyProperty
     */
    public function getDASH(): BalanceCurrencyProperty
    {
        return $this->DASH;
    }

    /**
     * @param BalanceCurrencyProperty $DASH
     * @return BalanceResponse
     */
    public function setDASH(BalanceCurrencyProperty $DASH): BalanceResponse
    {
        $this->DASH = $DASH;
        return $this;
    }

    /**
     * @return BalanceCurrencyProperty
     */
    public function getZEC(): BalanceCurrencyProperty
    {
        return $this->ZEC;
    }

    /**
     * @param BalanceCurrencyProperty $ZEC
     * @return BalanceResponse
     */
    public function setZEC(BalanceCurrencyProperty $ZEC): BalanceResponse
    {
        $this->ZEC = $ZEC;
        return $this;
    }

    /**
     * @return BalanceCurrencyProperty
     */
    public function getUSD(): BalanceCurrencyProperty
    {
        return $this->USD;
    }

    /**
     * @param BalanceCurrencyProperty $USD
     * @return BalanceResponse
     */
    public function setUSD(BalanceCurrencyProperty $USD): BalanceResponse
    {
        $this->USD = $USD;
        return $this;
    }

    /**
     * @return BalanceCurrencyProperty
     */
    public function getEUR(): BalanceCurrencyProperty
    {
        return $this->EUR;
    }

    /**
     * @param BalanceCurrencyProperty $EUR
     * @return BalanceResponse
     */
    public function setEUR(BalanceCurrencyProperty $EUR): BalanceResponse
    {
        $this->EUR = $EUR;
        return $this;
    }

    /**
     * @return BalanceCurrencyProperty
     */
    public function getGBP(): BalanceCurrencyProperty
    {
        return $this->GBP;
    }

    /**
     * @param BalanceCurrencyProperty $GBP
     * @return BalanceResponse
     */
    public function setGBP(BalanceCurrencyProperty $GBP): BalanceResponse
    {
        $this->GBP = $GBP;
        return $this;
    }

    /**
     * @return BalanceCurrencyProperty
     */
    public function getRUB(): BalanceCurrencyProperty
    {
        return $this->RUB;
    }

    /**
     * @param BalanceCurrencyProperty $RUB
     * @return BalanceResponse
     */
    public function setRUB(BalanceCurrencyProperty $RUB): BalanceResponse
    {
        $this->RUB = $RUB;
        return $this;
    }

    /**
     * @return BalanceCurrencyProperty
     */
    public function getGHS(): BalanceCurrencyProperty
    {
        return $this->GHS;
    }

    /**
     * @param BalanceCurrencyProperty $GHS
     * @return BalanceResponse
     */
    public function setGHS(BalanceCurrencyProperty $GHS): BalanceResponse
    {
        $this->GHS = $GHS;
        return $this;
    }

    /**
     * @return BalanceCurrencyProperty
     */
    public function getXRP(): BalanceCurrencyProperty
    {
        return $this->XRP;
    }

    /**
     * @param BalanceCurrencyProperty $XRP
     * @return BalanceResponse
     */
    public function setXRP(BalanceCurrencyProperty $XRP): BalanceResponse
    {
        $this->XRP = $XRP;
        return $this;
    }

}